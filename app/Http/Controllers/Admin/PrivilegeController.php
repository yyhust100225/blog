<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Privilege;

class PrivilegeController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 权限列表
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        return view('admin.privilege.list');
    }

    /**
     * 动态查询权限列表
     * @param Request $request
     * @param Privilege $privilege
     * @return mixed
     */
    public function data(Request $request, Privilege $privilege)
    {
        return $this->tableData($request, $privilege);
    }

    /**
     * 创建权限页面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.privilege.create');
    }

    /**
     * 提交创建新权限信息
     * @param Request $request
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubmit(Request $request, Privilege $privilege)
    {
        // 验证提交数据
        $validatedData = $request->validate([
            'name' => 'required|unique:privileges|min:2',
            'controller' => ['required', 'unique:privileges'],
            'route' => ['required', 'unique:privileges'],
        ]);

        $data = $request->all();

        return $this->saveData($privilege, $data);
    }

    /**
     * 编辑权限页面
     * @param $id
     * @param Request $request
     * @param Privilege $privilege
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id = NULL, Request $request, Privilege $privilege)
    {
        // 找不到指定编辑资源
        if(is_null($id) || !($privilege = $privilege->find($id))) {
            abort(404);
        }

        return view('admin.privilege.edit', [
            'privilege' => $privilege,
        ]);
    }

    /**
     * 提交编辑权限信息
     * @param Request $request
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSubmit(Request $request, Privilege $privilege)
    {
        $id = $request->input('id');
        // 验证提交数据
        $validatedData = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('privileges')->ignore($id)],
            'controller' => ['required', Rule::unique('privileges')->ignore($id)],
            'route' => ['required', Rule::unique('privileges')->ignore($id)],
        ]);

        // 查询不到指定编辑资源
        if(!$privilege = $privilege->find($id))
            return response()->json([
                'success' => false,
                'message' => trans('admin/message.request failed'),
            ], 404);

        $data = $request->all();

        return $this->saveData($privilege, $data);
    }

    /**
     * 新增或编辑权限
     * @param Privilege $privilege
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveData(Privilege $privilege, $data)
    {
        // 设置权限信息
        $privilege->name = $data['name'];
        $privilege->route = $data['route'];
        $privilege->controller = $data['controller'];
        $privilege->remark = empty($data['remark']) ? '' : $data['remark'];
        $privilege->pc_id = 1;

        // 存储数据
        DB::transaction(function() use($privilege){
            $privilege->save();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }

    /**
     * 删除权限信息
     * @param Request $request
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, Privilege $privilege)
    {
        $id = $request->input('id');
        $privilege = $privilege->find($id);

        // 存储数据
        DB::transaction(function() use($privilege){
            $privilege->delete();
        }, 5);

        return response()->json([
            'success' => true,
            'message' => trans('admin/message.request success'),
        ], 200);
    }
}
