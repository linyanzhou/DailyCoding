<?php

/**
 * 遍历某个目录下的所有文件(递归实现)
 * 参考文档：https://www.cnblogs.com/zhangmiaomiao/p/6013299.html
 * @param string $dir
 */
function scanAll2($dir)
{
    echo $dir . "<br/>";

    if (is_dir($dir)) {
        $children = scandir($dir);
        foreach ($children as $child) {
            if ($child !== '.' && $child !== '..') {
                scanAll2($dir . '/' . $child);
            }
        }
    }
}

scanAll2('/Users/MrC/Test/DailyCoding');
