<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function addUser()
    {
        $pass = '123123';
        $email = 'lisi@qq.com';
        $user_name = Str::random(8);
        // 使用密码函数
        $password = password_hash($pass,PASSWORD_BCRYPT);


        $data = [
            'user_name' => $user_name,
            'password' =>  $password,
            'email' => $email,
        ];

        $uid = UserModel::insertGetId($data);
        var_dump($uid);
    } 

    public function add()
    {
        echo "服务器：123.56.158.49，服务器密码：123456abc..，域名：weixin1905.zmrzzj.com 请问";
    }
}
