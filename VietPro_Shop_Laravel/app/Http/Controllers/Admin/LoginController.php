<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if ($request->remember == 'Remember_Me') {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin/home');
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors('Sai tài khoản hoặc mật khẩu');
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect('/');
    }

}
