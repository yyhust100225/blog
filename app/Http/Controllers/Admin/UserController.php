<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function users()
    {
        $users = User::all();
        dd(UserResource::collection($users));
        return view('admin.user.users');
    }

    public function usersData()
    {
        $users = User::all();
        return UserResource::collection($users);
    }
}
