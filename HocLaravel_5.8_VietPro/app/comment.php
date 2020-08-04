<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //Tạo liên kết bảng:
    protected $table = 'comment';

    //Khai báo khóa chính:
    protected $primaryKey = 'id_comment';

    //Bảng có sử dụng timestamps ko?
    public $timestamps = true; //Mặc định là True, k cần viết cũng được
}
