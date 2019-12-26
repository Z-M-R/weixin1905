<?php

namespace App\Http\Controllers\WeiXin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WxUserModel;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;


class WxSendmsgController extends Controller
{
    public function sendMsg()
    {
        //echo __METHOD__;
        $openid_arr=WxUserModel::select('openid','nickname','sex')->get()->toArray();
        //echo '<pre>';print_r($openid_arr);echo '</pre>';


        $openid=array_column($openid_arr,'openid');
        //echo '<pre>';print_r($openid);echo '</pre>'; 


        $url='https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$this->access_token;

        $msg = '尊敬的用户您好，目前公司开展签到送积分兑换活动，详情请进入公众号查看';


        $data=[
            'touser'=>$openid,
            'msgtype'=>'text',
            'text'=>['content'=>$msg]
        ];


        $client=new Client();
        $response=$client->request('POST',$url,[
            'body'=>json_encode($data,JSON_UNESCAPED_UNICODE)
        ]);


        echo $response->getBody();


    }


    protected $access_token;


    public function __construct()
    {
        //获取access_token
        $this->access_token=$this->getAccessToken();
    }


    public function test()
    {
        echo $this->access_token;
    }


    protected function getAccessToken()
    {
        $key='wx_access_token';
        $access_token=Redis::get($key);
        if($access_token){
            return $access_token;
        }


        $url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.env('WX_APPID').'&secret='.env('WX_APPSECRET');
        $data_json=file_get_contents($url);
        $arr=json_decode($data_json,true);


        Redis::set($key,$arr['access_token']);
        Redis::expire($key,3600);
        return $arr['access_token'];
    }




    /**
     * 刷新token
     */
    public function flushAccessToken()
    {
        $key="wexin_access_token";
        Redis::del($key);
        echo $this->getAccessToken();
    }
}
