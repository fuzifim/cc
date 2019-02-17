<?php 
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Auth; 
use Theme; 
use Route; 
use App\Model\Note; 
use Cache; 
use Redirect;
use DB;
use App\Model\Channel;
class ConstructController extends Controller
{

    public $_domain;
	public $_parame; 
	public $_rulesDomain; 
	public $_domainName;
    public $_pieces;
	public $_siteType;
	public $_channel;
    public $_channel_attribute;
    public $_channel_seo;
    public $_channel_color;
    public $_channel_logo;
    public $_channel_background;
    public $_channel_banner;
	public function __construct(){
        Theme::uses('main');
		$this->_parame=Route::current()->parameters(); 
		$this->_rulesDomain = Cache::store('file')->rememberForever('rulesDomain', function()
		{
			$pdp_url = 'https://raw.githubusercontent.com/publicsuffix/list/master/public_suffix_list.dat';
			$rules = \Pdp\Rules::createFromPath($pdp_url); 
			return $rules; 
		});
        $parsedUrl=parse_url(Request::url());
        $this->_domainName = $this->_rulesDomain->resolve($parsedUrl['host']);
        if(!empty($this->_domainName->getSubDomain()) && $this->_domainName->getSubDomain()!='www'){
            $this->_pieces = explode("-", $this->_domainName->getSubDomain());
            $checkWWW = explode(".", $this->_domainName->getSubDomain());
            if(!empty($this->_pieces[0]) && $this->_pieces[0]=='post'){
                $this->_siteType='infoPost';
            }else if(!empty($this->_pieces[0]) && $this->_pieces[0]=='news'){
                $this->_siteType='infoNews';
            }else if(!empty($this->_pieces[0]) && $this->_pieces[0]=='feed'){
                $this->_siteType='infoFeed';
            }else if(!empty($this->_pieces[0]) && $this->_pieces[0]=='com'){
                $this->_siteType='infoCompany';
            }else if(!empty($checkWWW[0]) && $checkWWW[0]=='www'){
                $this->_siteType='redirectUrl';
            }else{
                $this->_siteType='infoSite';
            }
        }else{
            $this->_siteType='infoSite';
        }
        if($this->_siteType=='infoSite'){
            $this->_channel = Cache::store('memcached')->remember('_channel_'.$this->_domainName->getDomain(), 1, function()
            {
                return DB::table('domain')
                    ->where('domain_encode',base64_encode($this->_domainName->getDomain()))
                    ->leftJoin('domain_join_channel','domain_join_channel.domain_id','=','domain.id')
                    ->leftJoin('channel','channel.id','=','domain_join_channel.channel_id')
                    ->select('domain.domain','channel.*')
                    ->first();
            });
            if(!empty($this->_channel->channel_name)){
                $this->_siteType='infoChannel';
                $this->_channel_attribute = Cache::store('memcached')->remember('_channel_attribute_'.$this->_channel->id, 1, function()
                {
                    return DB::table('channel_attribute')
                        ->where('channel_id',$this->_channel->id)
                        ->get();
                });
                foreach ($this->_channel_attribute as $attribute){
                    if($attribute->type==Channel::ATTRIBUTE_SEO){
                        $this->_channel_seo=$attribute;
                    }
                    if($attribute->type==Channel::ATTRIBUTE_COLOR){
                        $this->_channel_color=json_decode($attribute->value);
                    }
                    if($attribute->type==Channel::ATTRIBUTE_LOGO){
                        $this->_channel_logo=json_decode($attribute->value);
                    }
                    if($attribute->type==Channel::ATTRIBUTE_BACKGROUND){
                        $this->_channel_background=json_decode($attribute->value);
                    }
                    if($attribute->type==Channel::ATTRIBUTE_BANNER){
                        $this->_channel_banner=json_decode($attribute->value);
                    }
                }
                Theme::uses('default')->layout('default');
            }else{
                $this->_siteType='infoDomain';
            }
        }
		view()->share(
			'channel',array(
                'info'=>$this->_channel,
                'domain'=>$this->_channel->domain,
                'security'=>true,
                'seo'=>$this->_channel_seo,
                'color'=>$this->_channel_color,
                'logo'=>$this->_channel_logo,
                'background'=>$this->_channel_background,
                'banner'=>$this->_channel_banner
            )
		);
	}
}