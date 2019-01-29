<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Model\Index_note;
use GuzzleHttp\Client;
class GetDNSDomain implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $DNSNote;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($DNSNote)
    {
        $this->DNSNote=$DNSNote;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->DNSNote as $domain){
            \Log::error($domain->domain);
            $replaceDomain=str_replace('www.', '',$domain->domain);
            $getRecord=@dns_get_record($replaceDomain,DNS_ALL);
            if($getRecord){
                $noteMer=array('dns_record'=>$this->utf8_converter($getRecord));
                $domain->attribute= array_merge($domain->attribute, $noteMer);
                //$domain->updated_at=new \MongoDB\BSON\UTCDateTime(Carbon::now());
                $domain->save();
                if(count($getRecord)){
                    foreach($getRecord as $record){
                        if($record['type']=='A'){
                            $checkExist=Index_note::where('type','ip')->where('title_encode',base64_encode($record['ip']))->first();
                            if(empty($checkExist->id)){
                                $url='http://ip-api.com/json/'.$record['ip'];
                                $client = new Client([
                                    'headers' => [
                                        'Content-Type' => 'text/html',
                                        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36'
                                    ],
                                    'connect_timeout' => '5',
                                    'timeout' => '5'
                                ]);
                                $response = $client->request('GET', $url);
                                $getResponse=$response->getBody()->getContents();
                                $data=array(
                                    'type'=>'ip',
                                    'status'=>'active'
                                );
                                $noteIp=new Index_note($data);
                                $noteIp->title=$record['ip'];
                                $noteIp->title_encode=base64_encode($record['ip']);
                                $noteIp->description=$getResponse;
                                $noteIp->ip_type=$record['type'];
                                $noteIp->save();
                            }
                        }else if($record['type']=='AAAA'){
                            $checkExist=Index_note::where('type','ip')->where('title_encode',base64_encode($record['ipv6']))->first();
                            if(empty($checkExist->id)){
                                $url='http://ip-api.com/json/'.$record['ipv6'];
                                $client = new Client([
                                    'headers' => [
                                        'Content-Type' => 'text/html',
                                        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36'
                                    ],
                                    'connect_timeout' => '5',
                                    'timeout' => '5'
                                ]);
                                $response = $client->request('GET', $url);
                                $getResponse=$response->getBody()->getContents();
                                $data=array(
                                    'type'=>'ip',
                                    'status'=>'active'
                                );
                                $noteIp=new Index_note($data);
                                $noteIp->title=$record['ipv6'];
                                $noteIp->title_encode=base64_encode($record['ipv6']);
                                $noteIp->description=$getResponse;
                                $noteIp->ip_type=$record['type'];
                                $noteIp->save();
                            }
                        }
                    }
                }
                echo $domain->domain.'<p>';
            }else{
                $noteMer=array('dns_record'=>[]);
                $domain->attribute= array_merge($domain->attribute, $noteMer);
                $domain->save();
            }
        }
    }
    function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
            }
        });

        return $array;
    }
}
