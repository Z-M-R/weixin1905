<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $file_name = "abc.mp3";
    $info = pathinfo($file_name);
    echo $file_name . '的文件扩展名为000 : ' . pathinfo($file_name)['extension'];die;
    echo '<pre>';print_r($info);echo '</pre>';die;
    return view('welcome');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Index\IndexController@index');


Route::get('/info',function(){
    phpinfo();
});

Route::get('/user/adduser','User\LoginController@addUser');
Route::get('/user/add','User\LoginController@add');
Route::get('/test/baidu','Test\TestController@baidu');
Route::get('/test/xml','Test\TestController@xmlTest');
Route::get('/dev/redis/del','VoteController@delKey');

// 微信开发

Route::get('/wx','WeiXin\WxController@wechat');
Route::get('/wx/test','WeiXin\WxController@test');
Route::post('/wx','WeiXin\WxController@receiv');
Route::get('/wx/media','WeiXin\WxController@getMedia');  //获取临时素材
Route::get('/wx/flush/access_token','WeiXin\WxController@flushAccessToken');  // 刷新access_token
Route::get('/wx/menu','WeiXin\WxController@createMenu');  // 创建菜单



//微信公众号
Route::get('/vote','VoteController@index');  // 创建菜单
Route::get('/goods/detail','Goods\IndexController@detail'); 
