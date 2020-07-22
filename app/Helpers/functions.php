<?php

function test()
{
    echo 'test<br>';
}

function limit_length_str($str, $num, $replace = '...') {
    // 长度符合条件
    if(strlen($str) <= $num) return $str;
    // 修改字符串
    return substr($str,0, $num) . $replace;
}
