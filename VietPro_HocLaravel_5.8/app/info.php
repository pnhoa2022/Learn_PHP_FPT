<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    //Tạo liên kết bảng:
    protected $table = 'info';

    //Khai báo khóa chính:
    protected $primaryKey = 'id_info';

    //Bảng có sử dụng timestamps ko?
    public $timestamps = true; //Mặc định là True, k cần viết cũng được

    public function users () {
        return $this->belongsTo('App\users', 'id_user', 'id_user');
    }
}
