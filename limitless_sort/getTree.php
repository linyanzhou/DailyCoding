<?php

/**
 * 此方法由@Tonton 提供
 * http://my.oschina.net/u/918697
 * @date 2012-12-12
 * @param array $aArr
 * @return array
 */
function genTree5($aArr)
{
    $items = array_values($aArr);
    foreach ($items as $item) {
        $items[$item['pid']]['son'][] = &$items[$item['id']];
    }

    return isset($items[0]['son']) ? $items[0]['son'] : array();
}

/**
 * 将数据格式化成树形结构
 * @author Xuefen.Tong
 * @param array $aArr
 * @return array
 */
function genTree9($aArr)
{
    $tree = array(); //格式化好的树
    $items = array_values($aArr);
    foreach ($items as $item) {
        if (isset($items[$item['pid']])) {
            $items[$item['pid']]['son'][] = &$items[$item['id']];
        } else {
            $tree[] = &$items[$item['id']];
        }
    }

    return $tree;
}

$items = array(
    4 => array('id' => 1, 'pid' => 0, 'name' => '江西省'),
    6 => array('id' => 2, 'pid' => 0, 'name' => '黑龙江省'),
    13 => array('id' => 3, 'pid' => 1, 'name' => '南昌市'),
    17 => array('id' => 4, 'pid' => 2, 'name' => '哈尔滨市'),
    25 => array('id' => 5, 'pid' => 2, 'name' => '鸡西市'),
    64 => array('id' => 6, 'pid' => 4, 'name' => '香坊区'),
    65 => array('id' => 7, 'pid' => 4, 'name' => '南岗区'),
    83 => array('id' => 8, 'pid' => 6, 'name' => '和兴路'),
    84 => array('id' => 9, 'pid' => 7, 'name' => '西大直街'),
    85 => array('id' => 10, 'pid' => 8, 'name' => '东北林业大学'),
    86=> array('id' => 11, 'pid' => 9, 'name' => '哈尔滨工业大学'),
    124 => array('id' => 12, 'pid' => 8, 'name' => '哈尔滨师范大学'),
    132 => array('id' => 13, 'pid' => 1, 'name' => '赣州市'),
    144 => array('id' => 14, 'pid' => 13, 'name' => '赣县'),
    154 => array('id' => 15, 'pid' => 13, 'name' => '于都县'),
    162 => array('id' => 16, 'pid' => 14, 'name' => '茅店镇'),
    174 => array('id' => 17, 'pid' => 14, 'name' => '大田乡'),
    184 => array('id' => 18, 'pid' => 16, 'name' => '义源村'),
    191 => array('id' => 19, 'pid' => 16, 'name' => '上坝村'),
);
echo "<pre>";
//print_r(genTree5($items));
print_r(genTree9($items));