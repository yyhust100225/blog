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

    }

    /**
     * 动态查询表格数据
     * @param Request $request
     * @param Eloquent $model
     * @return mixed
     */
    protected function tableData(Request $request, $model)
    {
        // 表格字段信息
        $columns = $request->get('columns');

        // 分页参数
        $start = $request->get('start');
        $length = $request->get('length');

        // 排序参数
        $order = $request->get('order');
        $order_column = $columns[$order[0]['column']]['data'];
        $order_dir = $order[0]['dir'];

        // 搜索参数
        $search = $request->get('search');
        if(!empty($search['value'])) {
            foreach($columns as $column)
                if($column['searchable'] === 'true') {
                    if ($column['data'] == 'id')
                        $model = $model->orWhere($column['data'], $search['value']);
                    else
                        $model = $model->orWhere($column['data'], 'like', '%' . $search['value'] . '%');
            }
        }

        // 查询结果
        $count = $model->count();
        $users = $model->skip($start)->take($length)->orderBy($order_column, $order_dir)->get();

        $data['draw'] = $request->get('draw');
        $data['data'] = $users;
        $data['recordsTotal'] = $count;
        $data['recordsFiltered'] = $count;

        return $data;
    }
}
