<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function getIndex()
    {
        $id = 1;
        return view('page.home', ['id' => $id]);
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(LoginRequest $loginRequest)
    {
        $email = $loginRequest->id;
        $password = $loginRequest->password;

        //echo $email . " \ " .$password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return view('page.home');
        } else {
            return redirect()->back()
                ->with('thongBao', 'Tài khoản mật khẩu không chính xác')
                ->withErrors("Sai Tài khoản mật khẩu!")
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function getPhanTrang()
    {
        $datas['users'] = users::where('id_user', '>', '0')->paginate(2);

        foreach ( $datas['users'] as $user) {
            $user->password = Str::limit($user->password, 10);
        }

        return view('page.paginate', $datas);

        //Muốn style lại phân trang thì [php artisan vendor:publish --tag=laravel-pagination]
    }

    public function sendMail () {
        $data = [
            'code' => Str::upper(Str::random(6)),
        ];

        Mail::send('sendMail', $data, function ($message) {
            $message->from('ARS.CODEDY@gmail.com', 'ARS.CODEDY');
            $message->to('hieundth1908028@fpt.edu.vn', 'FPT');
            $message->subject('Thư gửi bằng Laravel - Thông báo mã xác thực tài khoản');
        });
    }
}
