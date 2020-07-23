<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 用户列表页
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        return view('admin.user.users');
    }

    /**
     * 动态查询用户列表数据
     * @param Request $request
     * @return mixed
     */
    public function usersData(Request $request)
    {
        $model = new User();
        return $this->tableData($request, $model->with('userInfo'));
    }


    public function create()
    {
        echo Storage::disk('image')->url('avatars/tx1.jpg');die;
        return view('admin.user.create');
    }

    /**
     * 更新头像
     */
    public function uploadAvatar(Request $request)
    {
        $path = $request->file('avatar')->store('avatars', 'image');
        return $path;
    }
}
