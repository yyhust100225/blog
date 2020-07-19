<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends CommonController
{
    use AuthenticatesUsers;

    /**
     * 登录页
     * @return |\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
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
        $credentials = $request->only($this->username($request), 'password');
        $remember = (boolean)(isset($request->remember) ?? false);
        if($res = Auth::attempt($credentials, $remember)){
            return redirect()->intended(route('home'));
        } else {
            return redirect()->route('login');
        }
    }

    public function username(Request $request)
    {
        $username = $request->input('username');
        $key = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $request->merge([$key => $username]);
        return $key;
    }
}
