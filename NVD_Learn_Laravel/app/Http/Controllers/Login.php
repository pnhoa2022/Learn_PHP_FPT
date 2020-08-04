<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:0'
        ]);
    }


    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input("password");
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return Redirect::to('/login')->withInput()->withErrors($validator);
            }

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                Redirect::to('/home');
            } else {
                Redirect::to('/login')->withInput()->withErrors('Email hoặc mật khẩu không đúng!');
            }
            return back()->withInput();
        }

        return view('login.index');
    }
}
