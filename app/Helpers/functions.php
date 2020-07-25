<?php

function test()
{
    echo 'test<br>';
}

/**
 * 截取字符串, 过长可替换
 * @param $str
 * @param $num
 * @param string $replace
 * @return string
 */
function limit_length_str($str, $num, $replace = '...') {
    // 长度符合条件
    if(strlen($str) <= $num) return $str;
    // 修改字符串
    return substr($str,0, $num) . $replace;
}

/**
 * 获取当前控制器名称
 * @param $request
 * @return mixed
 */
function get_controller_name($request)
{
    $action_name = $request->route()->getActionName();

    $path_arr = explode('\\', $action_name);

    preg_match('/^(.+?)Controller/', end($path_arr), $match);

    return $match[1];
}
