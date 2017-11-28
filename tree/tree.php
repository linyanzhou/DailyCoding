<?php
/**
 *    PHP二叉树算法
 *    Created on 2017-8-7
 *    Author     entner
 *    Email     1185087164@qq.com
 */

/*
    假设我构造一颗如下的二叉树
            A
        B       C
      #   D   #   #
        #   #
*/

error_reporting(E_ALL ^ E_NOTICE);

$data = array(
    0 => 'A',
    1 => 'B',
    2 => '#',
    3 => 'D',
    4 => '#',
    5 => '#',
    6 => 'C',
    7 => '#',
    8 => '#',
);

Class BTNode
{
    public $data;
    public $lChild;
    public $rChild;

    public function __construct($data = null)
    {
        $this->data = $data;
    }
}

Class BinaryTree
{

    public $root;
    public $btData;

    public function __construct($data = null)
    {
        $this->root = null;
        $this->btData = $data;
        //$this->preOrderCreateBT($this->root);
    }

    public function preOrderCreateBT(&$root = null)
    {
        $elem = array_shift($this->btData);    //移除数组头部，并作为结果返回
        if ($elem == null) {    #判断：当数组为空时
            return;
        } else {
            if ($elem == '#') {    #判断：当数组为无效单元时，该节点是虚节点，退出当前递归，执行下一个递归
                $root = '#';

                return $root;
            } else {
                $root = new BTNode();
                $root->data = $elem;
                $this->preOrderCreateBT($root->lChild);
                $this->preOrderCreateBT($root->rChild);
            }
        }

        return $root;
    }


    /**
     * TODO:先序遍历二叉树
     * @param $tree object 二叉树
     * @param $temp array  二叉树输出节点存储数组
     */
    public function printBTPreOrder($tree, &$temp)
    {
        if ($tree != null) {
            $temp[] = $tree->data;
            $this->printBTPreOrder($tree->lChild, $temp);
            $this->printBTPreOrder($tree->rChild, $temp);
        } else {
            return;
        }

        return $temp;
    }

    /**
     * TODO:中序遍历二叉树
     * @param $tree object 二叉树
     * @param $temp array  二叉树输出节点存储数组
     */
    public function printBTInOrder($tree, &$temp)
    {
        if ($tree != null) {
            $this->printBTInOrder($tree->lChild, $temp);
            $temp[] = $tree->data;
            $this->printBTInOrder($tree->rChild, $temp);
        } else {
            return;
        }

        return $temp;
    }

    /**
     * TODO:中序遍历二叉树
     * @param $tree object 二叉树
     * @param $temp array  二叉树输出节点存储数组
     */
    public function printBTPosOrder($tree, &$temp)
    {
        if ($tree != null) {
            $this->printBTPosOrder($tree->lChild, $temp);
            $this->printBTPosOrder($tree->rChild, $temp);
            $temp[] = $tree->data;

        } else {
            return;
        }

        return $temp;
    }

    /**
     * TODO:层序遍历二叉树（需要将书中节点放入队中）
     *
     */
    function PrintFromTopToBottom(&$root)
    {
        // write code here
        if ($root == null) {
            return;
        }
        $queue = array();
        array_push($queue, $root);

        while (!is_null($node = array_shift($queue))) {
            echo $node->data . ' ';
            if ($node->left != null) {
                array_push($queue, $node->lChild);

            }
            if ($node->left != null) {
                array_push($queue, $node->rChild);
            }
        }
    }

}


$object = new BinaryTree($data);
$tree = $object->preOrderCreateBT($root);

echo "<pre>";
print_r($tree);
die;