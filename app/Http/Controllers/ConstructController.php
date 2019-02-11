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
class ConstructController extends Controller
{
	public $_parame; 
	public $_rulesDomain; 
	public $_domainName;
    public $_pieces;
	public $_siteType;
	public $_channel;
	public $_domain;
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
        }
        if($this->_siteType=='infoSite'){
            $getInfoSite=DB::table('domain')
                ->where('domain_encode',base64_encode($this->_domainName->getDomain()))
                ->leftJoin('domain_join_channel','domain_join_channel.domain_id','=','domain.id')
                ->leftJoin('channel','channel.id','=','domain_join_channel.channel_id')
                ->select('domain.domain','channel.*')
                ->first();
            if(!empty($getInfoSite->channel_name)){
                $this->_channel=$getInfoSite;
                $this->_siteType='infoChannel';
                Theme::uses('control')->layout('default');
            }else{
                $this->_siteType='infoDomain';
            }
        }
		view()->share(
			'channel',array(
                'info'=>$this->_channel
            )
		);
	}
}