<?php


namespace App\Http\Controllers\Index;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WxUserModel;


class IndexController extends Controller
{
    public function index()
    {
        $code=$_GET['code'];
        $data = $this->getAccessToken($code);   //获取access_token


        //判断用户是否已存在
        $openid=$data['openid'];
        $u=WxUserModel::where(['openid'=>$openid])->first();
        if($u){
            //用户已存在
            $user_info=$u->toArray();


        }else{
            $user_info=$this->getUserInfo($data['access_token'],$data['openid']);       //获取用户信息
            //存入数据库
            WxUserModel::insertGetId($user_info);
        }
        
        $data=[
            'u'=>$user_info
        ];
        return view('Index.index',$data);
    }




    /**
     * 根据code获取access_token
     */
    protected function getAccessToken($code)
    {
        $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WX_APPID').'&secret='.env('WX_APPSECRET').'&code='.$code.'&grant_type=authorization_code';
        $json_data=file_get_contents($url);
        return json_decode($json_data,true);
    }




    /**
     * 获取用户基本信息
     */
    protected function getUserInfo($access_token,$openid)
    {
        $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
        $json_data=file_get_contents($url);
        $data=json_decode($json_data,true);
        //echo '<pre>';print_r($usr_info);echo '</pre>';
        if(isset($data['errcode'])){
            die("出现错误");        //报错信息
        }
        return $data;       //返回用户信息


    } 
}