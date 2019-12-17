<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WxMsgModel extends Model
{
    protected $table = 'p_wx_msg';
    protected $primaryKey = 'uid';
}
