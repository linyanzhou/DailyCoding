<?php

$str = "sdfhletlsflahlajgfd;lsje;r;wj;ralajfe149253573";
//字符串分隔到数组中
$arr = str_split($str);
//用于统计数组中所有值出现的次数，返回一个数组
$arr2 = array_count_values($arr);
//键名为原数组的键值，键值为出数
arsort($arr2);//按键值倒序排列
print_r($arr2);exit;