<?php

namespace App\Admin\Controllers;

use App\Model\WxUserModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use GuzzleHttp\Client;

class WxSendmsgController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '微信群发';

    public function sendMsg()
    {
        // echo __METHOD__;die;

        $openid_arr = WxUserModel::select('openid','nickname','sex')->get()->toArray();

        echo '<pre>';print_r($openid_arr);echo '</pre>';
        $openid = array_column($openid_arr,'openid');
        echo '<pre>';print_r($openid);echo '</pre>';
        
        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=28_95HH7dzwWaYXJWvbUc2ipL96Wm--x9acGISN5dtPZvntNvsfVxmp3NYcnGJVcZ4K2R8C2RxHuQMW-uRdCX9irykopbiKYD-qvD3Zif1SE5qsfBAsGI6-ZhwCxnb7usYCLa4GNkCxhEMf8NAkILCcAEABEV';
        
        $msg = date('Y-m-d H:i:s') . '放假了';

        $data = [
            'touser' => $openid,
            'msgtype' => 'text',
            'text' => ['content'=>$msg]
        ];

        $client = new Client();
        $response = $client->requset('POST',$url,[
            'body' => json_encode($data,JSON_UNESCAPED_UNICODE)
        ]);

        echo $response->gitBody();

    }

    
}
