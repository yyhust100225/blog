<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    /**
     * 后台基类构造方法
     * CommonController constructor.
     */
    public function __construct()
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }
    }
}
