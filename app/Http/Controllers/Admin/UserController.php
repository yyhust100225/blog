<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
use App\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
    public function list()
    {
        return view('admin.user.list');
    }

    /**
     * 动态查询用户列表数据
     * @param Request $request
     * @return mixed
     */
    public function data(Request $request, User $user)
    {
        return $this->tableData($request, $user->with('userInfo'));
    }

    /**
     * 创建用户页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // 获取角色列表
        $roles = Role::get(['id', 'name']);
        return view('admin.user.create', [
            'roles' => $roles
        ]);
    }

    /**
     * 更新头像
     */
    public function uploadAvatar(Request $request)
    {
        $path = $request->file('avatar')->store('avatars', 'image');
        if($path) {
            return response()->json([
                'success' => true,
                'message' => trans('admin/auth.upload success'),
                'path' => $path,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => trans('admin/auth.upload failed'),
                'path' => '',
            ], 400);
        }
    }

    public function createSubmit(Request $request, User $user, UserInfo $user_info)
    {
        // 验证提交数据
        $validatedData = $request->validate([
            'name' => 'required|unique:users|min:6',
            'password' => 'required|min:6|same:_password',
            'email' => 'required|email|unique:users',
        ]);

        $data = $request->all();

        // 创建新用户
        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        $user->status = FORBIDDEN;

        // 创建用户基本信息
        $user_info->nickname = !is_null($data['nickname']) ? $data['nickname'] : '';
        $user_info->gender = $data['gender'];
        $user_info->tel = !is_null($data['tel']) ? $data['tel'] : '';
        $user_info->avatar = $data['avatar'];
        $user_info->remark = !is_null($data['remark']) ? $data['remark'] : '';

        // 存储数据
        DB::transaction(function() use($user, $user_info){
            $user->save();
            $user_info->user_id = $user->id;
            $user_info->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 编辑用户页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, Request $request, User $user)
    {
        $user = $user->with('userInfo')->find($id);
        // 获取角色列表
        $roles = Role::get(['id', 'name']);
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * 编辑用户基本信息
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSubmit(Request $request, User $user)
    {
        $id = $request->input('id');
        // 验证提交数据
        $validatedData = $request->validate([
            'name' => ['required', 'min:6', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
        ]);
        $user = $user->find($id);

        $data = $request->all();
        // 更新用户
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];

        // 更新基本信息
        $user->userInfo->nickname = !is_null($data['nickname']) ? $data['nickname'] : '';
        $user->userInfo->gender = $data['gender'];
        $user->userInfo->tel = !is_null($data['tel']) ? $data['tel'] : '';
        $user->userInfo->avatar = $data['avatar'];
        $user->userInfo->remark = !is_null($data['remark']) ? $data['remark'] : '';

        // 存储数据
        DB::transaction(function() use($user){
            $user->save();
            $user->userInfo->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 用户密码重置页面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password(Request $request)
    {
        return view('admin.user.password');
    }

    /**
     * 密码重置提交
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function passwordReset(Request $request, User $user)
    {
        $id = $request->input('id');
        $user = $user->find($id);

        $data = $request->all();

        $request->validate([
            'old_password' => ['required', new Password($user->password)],
            'password' => 'required|min:6|same:_password',
        ]);

        $user->password = Hash::make($data['password']);

        // 存储数据
        DB::transaction(function() use($user){
            $user->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 用户删除操作
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, User $user)
    {
        $id = $request->input('id');
        $user = $user->find($id);

        // 存储数据
        DB::transaction(function() use($user){
            $user->delete();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 修改账户状态
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request, User $user)
    {
        $id = $request->input('id');
        $user = $user->find($id);

        $user->status = ($user->status == FORBIDDEN ? AVAILABLE : FORBIDDEN);

        // 存储数据
        DB::transaction(function() use($user){
            $user->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }
}
