<?php

$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);
/**
 * 冒泡排序
 * 参考文档：https://www.cnblogs.com/eniac12/p/5329396.html#s1
 * 参考文档：http://www.cnblogs.com/lijiageng/p/5867866.html
 * @param $arr
 * @return mixed
 */
function pao($arr)
{
    $len = count($arr);
    //该层循环控制 需要冒泡的轮数
    for ($i = 1; $i < $len; $i++) {
    //该层循环用来控制每轮 冒出一个数 需要比较的次数    A：为什么要减去$i   Q：因为经过几轮 就已经有几个最大的元素已确定位置
        for ($k = 0; $k < $len - $i; $k++) {
            // 交换顺序 数值大的放后面
            if ($arr[$k] > $arr[$k + 1]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }

    return $arr;
}

print_r(pao($arr));
exit;