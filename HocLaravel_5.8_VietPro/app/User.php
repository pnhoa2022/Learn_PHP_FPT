<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'Users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Email', 'Password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'Remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'Email_verified_at' => 'datetime',
    ];

    //Loại bỏ Token nếu bảng trong database k có cột ấy
//    public function setAttribute($key, $value)
//    {
//        $check = $key == $this->getRememberTokenName();
//
//        if (!$check) {
//            parent::setAttribute($key, $value);
//        }
//    }
}
