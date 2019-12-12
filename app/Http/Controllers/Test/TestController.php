<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;

class TestController extends Controller
{
    /*
        请求百度
    */
    public function baidu()
    {
        $url = 'https://theory.gmw.cn/2019-12/05/content_33377331.htm';
        $client = new Client();
        $response = $client->request('GET',$url);
        echo $response->getBody();
    }


    public function xmlTest()
    {
        $xml_str = '<xml><ToUserName><![CDATA[gh_9561a4053eb0]]></ToUserName>
        <FromUserName><![CDATA[oZ2duw52UsteQMlwJkds6fFviM50]]></FromUserName>
        <CreateTime>1575875978</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[1]]></Content>
        <MsgId>22561117032442866</MsgId>
        </xml>';


        $xml_obj = simplexml_load_string($xml_str);
        echo '<pre>';print_r($xml_obj);echo '</pre>';die;
        echo '<pre>';print_r($xml_obj);echo '</pre>'; echo '<hr>';

        echo 'ToUserName: ' . $xml_obj->ToUserName;echo '</br>';
        echo 'FromUserName: ' . $xml_obj->FromUserName;echo '</br>';
    }
}
