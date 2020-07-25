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
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginSubmit(Request $request)
    {
        $credentials = $request->only($this->username($request), 'password');
        $remember = (boolean)(isset($request->remember) ?? false);
        if($res = Auth::attempt($credentials, $remember)){
            // 账号禁用
            if($request->user()->status == 0) {
                // 退出登录
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => trans('admin/auth.account disable'),
                ], 401);
            } else if($request->user()->deleted == 1) {
                // 退出登录
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => trans('admin/auth.account deleted'),
                ], 401);
            } else {
                // 登录成功
                return response()->json([
                    'success' => true,
                    'message' => trans('admin/auth.login success'),
                ], 200);
            }
        } else {
            // 登录失败
            return response()->json([
                'success' => false,
                'message' => trans('admin/auth.login failed'),
            ], 401);
        }
    }

    /**
     * 获取验证用户名字段
     * @param Request $request
     * @return string
     */
    public function username(Request $request)
    {
        $username = $request->input('username');
        $key = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $request->merge([$key => $username]);
        return $key;
    }
}
