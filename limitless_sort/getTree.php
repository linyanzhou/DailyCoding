<?php
function genTree($items, $id = 'id', $pid = 'pid', $son = 'children')
{
    $tree = array(); //格式化的树
    $tmpMap = array();  //临时扁平数据

    foreach ($items as $item) {
        $tmpMap[$item[$id]] = $item;
    }

    foreach ($items as $item) {
        if (isset($tmpMap[$item[$pid]])) {
            $tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
        } else {
            $tree[] = &$tmpMap[$item[$id]];
        }
    }
    unset($tmpMap);

    return $tree;
}

$items1 = array(
    array('id' => 1, 'pid' => 0, 'name' => '一级11'),
    array('id' => 11, 'pid' => 0, 'name' => '一级12'),
    array('id' => 2, 'pid' => 1, 'name' => '二级21'),
    array('id' => 10, 'pid' => 11, 'name' => '二级22'),
    array('id' => 3, 'pid' => 1, 'name' => '二级23'),
    array('id' => 12, 'pid' => 11, 'name' => '二级24'),
    array('id' => 9, 'pid' => 1, 'name' => '二级25'),
    array('id' => 14, 'pid' => 1, 'name' => '二级26'),
    array('id' => 4, 'pid' => 9, 'name' => '三级31'),
    array('id' => 6, 'pid' => 9, 'name' => '三级32'),
    array('id' => 7, 'pid' => 4, 'name' => '四级41'),
    array('id' => 8, 'pid' => 4, 'name' => '四级42'),
    array('id' => 5, 'pid' => 4, 'name' => '四级43'),
    array('id' => 13, 'pid' => 4, 'name' => '四级44'),
    array('id' => 15, 'pid' => 8, 'name' => '五级51'),
    array('id' => 16, 'pid' => 8, 'name' => '五级52'),
    array('id' => 17, 'pid' => 8, 'name' => '五级53'),
    array('id' => 18, 'pid' => 16, 'name' => '六级64'),
);
var_dump(genTree($items1));