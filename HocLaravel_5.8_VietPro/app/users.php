<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //Tạo liên kết bảng:
    protected $table = 'users';

    //Khai báo khóa chính:
    protected $primaryKey = 'id_user';

    //Bảng có sử dụng timestamps ko?
    public $timestamps = true; //Mặc định là True, k cần viết cũng được

    public function info()
    {
        return $this->hasOne('App\info', 'id_user', 'id_user');
    }

    public function comment()
    {
        return $this->hasMany('App\comment', 'id_user', 'id_user');
    }
}
