<?php

/**
 * 顺序查找
 * 参考文档：http://blog.csdn.net/nuli888/article/details/52144044
 * @param $aArr
 * @param $iTarget
 * @return bool
 */
function shunXu($aArr, $iTarget){

    foreach($aArr as $v){
        if($v == $iTarget){
            return true;
        }
    }
    #查找失败
    return false;
}

$arr = array(1, 3, 5, 7, 9, 11);
$inx = shunXu($arr, 11);
var_dump($inx);