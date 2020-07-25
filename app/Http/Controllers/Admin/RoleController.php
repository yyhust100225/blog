<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Illuminate\Validation\Rule;

class RoleController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 角色列表
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        return view('admin.role.list');
    }

    /**
     * 动态查询角色列表
     * @param Request $request
     * @param Role $role
     * @return mixed
     */
    public function data(Request $request, Role $role)
    {
        return $this->tableData($request, $role->where('deleted', 'eq', NO_DELETED));
    }

    /**
     * 创建角色页面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.role.create');
    }

    /**
     * 提交创建新角色信息
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubmit(Request $request, Role $role)
    {
        // 验证提交数据
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|min:6',
        ]);

        $data = $request->all();

        // 创建新角色
        $role->name = $data['name'];
        $role->remark = $data['remark'];

        // 存储数据
        DB::transaction(function() use($role){
            $role->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 编辑角色页面
     * @param $id
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, Request $request, Role $role)
    {
        $role = $role->find($id);
        return view('admin.role.edit', [
            'role' => $role,
        ]);
    }

    /**
     * 提交编辑角色信息
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSubmit(Request $request, Role $role)
    {
        $id = $request->input('id');
        // 验证提交数据
        $validatedData = $request->validate([
            'name' => ['required', 'min:6', Rule::unique('roles')->ignore($id)],
        ]);

        $role = $role->find($id);
        $data = $request->all();

        // 更新角色信息
        $role->name = $data['name'];
        $role->remark = $data['remark'];

        // 存储数据
        DB::transaction(function() use($role){
            $role->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 删除角色信息
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, Role $role)
    {
        $id = $request->input('id');
        $role = $role->find($id);

        $role->deleted = DELETED;

        // 存储数据
        DB::transaction(function() use($role){
            $role->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }
}
