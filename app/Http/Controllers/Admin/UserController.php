<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.user.users');
    }

    public function usersData(Request $request)
    {
        $model = new User();
        return $this->tableData($request, $model->with('userInfo'));
    }
}
