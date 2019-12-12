<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WxUserModel extends Model
{
    // 关注者的数据表
    public $table = 'p_wx_users';
    protected $primaryKey = 'uid';
}
