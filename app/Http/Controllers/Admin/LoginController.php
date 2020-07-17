<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends CommonController
{
    /**
     * 登录页
     * @return |\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        if(Auth::check()) {
            return redirect()->route('home');
        }
        return view('admin.auth.login');
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * 登录验证
     * @param Request $request
     */
    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
    }
}
