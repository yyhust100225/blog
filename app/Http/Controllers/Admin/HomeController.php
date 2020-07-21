<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function index(Request $request)
    {
        return view('admin.home.dashboard');
    }
}
