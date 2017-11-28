<?php
$items = array(
    1 => array('id' => 1, 'pid' => 0, 'name' => '江西省'),
    2 => array('id' => 2, 'pid' => 0, 'name' => '黑龙江省'),
    3 => array('id' => 3, 'pid' => 1, 'name' => '南昌市'),
    4 => array('id' => 4, 'pid' => 2, 'name' => '哈尔滨市'),
    5 => array('id' => 5, 'pid' => 2, 'name' => '鸡西市'),
    6 => array('id' => 6, 'pid' => 4, 'name' => '香坊区'),
    7 => array('id' => 7, 'pid' => 4, 'name' => '南岗区'),
    8 => array('id' => 8, 'pid' => 6, 'name' => '和兴路'),
    9 => array('id' => 9, 'pid' => 7, 'name' => '西大直街'),
    10 => array('id' => 10, 'pid' => 8, 'name' => '东北林业大学'),
    11 => array('id' => 11, 'pid' => 9, 'name' => '哈尔滨工业大学'),
    12 => array('id' => 12, 'pid' => 8, 'name' => '哈尔滨师范大学'),
    13 => array('id' => 13, 'pid' => 1, 'name' => '赣州市'),
    14 => array('id' => 14, 'pid' => 13, 'name' => '赣县'),
    15 => array('id' => 15, 'pid' => 13, 'name' => '于都县'),
    16 => array('id' => 16, 'pid' => 14, 'name' => '茅店镇'),
    17 => array('id' => 17, 'pid' => 14, 'name' => '大田乡'),
    18 => array('id' => 18, 'pid' => 16, 'name' => '义源村'),
    19 => array('id' => 19, 'pid' => 16, 'name' => '上坝村'),
);

/**
 *TODO:通过引用方式实现无限极分类
 *
 */

function tree_Classify1($items)
{
    $tree = array();
    $packData = array();
    foreach ($items as $data) {
        $packData[$data['id']] = $data;
    }
    foreach ($packData as $key => $val) {
        if ($val['pid'] == 0) {//代表跟节点
            $tree[] =& $packData[$key];
        } else {
//找到其父类
            $packData[$val['pid']]['son'][] =& $packData[$key];
        }
    }

    return $tree;
}


/**
 *TODO:通过递归方式实现无限极分类
 *
 */

/*======================递归实现========================*/
$tree = $categories;
function get_attr($a,$pid){
    $tree = array();                                //每次都声明一个新数组用来放子元素
    foreach($a as $v){
        if($v['pid'] == $pid){                      //匹配子记录
            $v['children'] = get_attr($a,$v['id']); //递归获取子记录
            if($v['children'] == null){
                unset($v['children']);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
            }
            $tree[] = $v;                           //将记录存入新数组
        }
    }
    return $tree;                                  //返回新数组
}

print_r(get_attr($items,0));


