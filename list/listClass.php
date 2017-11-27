<?php
require_once("nodeClass.php");

//单链表
/**
 * Class singleLinkList
 * 参考文档：http://blog.csdn.net/u012543061/article/details/52488871
 */
class singleLinkList
{
    private $header; //链表头节点

    //构造方法
    public function __construct($id = null, $name = null)
    {
        $this->header = new node ($id, $name, null);
    }

    //获取链表长度
    public function getLinkLength()
    {
        $i = 0;
        $current = $this->header;
        while ($current->next != null) {
            $i++;
            $current = $current->next;
        }

        return $i;
    }

    //添加节点数据
    public function addLink($node)
    {
        $current = $this->header;
        while ($current->next != null) {
            if ($current->next->id > $node->id) {
                break;
            }
            $current = $current->next;
        }
        $node->next = $current->next;
        $current->next = $node;
    }

    //删除链表节点
    public function delLink($id)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != null) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo "未找到id=" . $id . "的节点！<br>";
        }
    }

    //判断连表是否为空
    public function isEmpty()
    {
        return $this->header == null;
    }

    //清空链表
    public function clear()
    {
        $this->header = null;
    }

    //获取链表
    public function getLinkList()
    {
        $current = $this->header;
        if ($current->next == null) {
            echo("链表为空!");

            return;
        }
        while ($current->next != null) {
            echo 'id:' . $current->next->id . '   name:' . $current->next->name . "<br>";
            if ($current->next->next == null) {
                break;
            }
            $current = $current->next;
        }
    }

    //获取节点名字
    public function getLinkNameById($id)
    {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空!";

            return;
        }
        while ($current->next != null) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }

        return $current->name;
    }

    //更新节点名称
    public function updateLink($id, $name)
    {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空!";

            return;
        }
        while ($current->next != null) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }

        return $current->name = $name;
    }
}

$lists = new singleLinkList ();
$lists->addLink(new node (5, 'eeeeee'));
$lists->addLink(new node (1, 'aaaaaa'));
$lists->addLink(new node (6, 'ffffff'));
$lists->addLink(new node (4, 'dddddd'));
$lists->addLink(new node (3, 'cccccc'));
$lists->addLink(new node (2, 'bbbbbb'));
$lists->getLinkList();
echo "<br>-----------删除节点--------------<br>";
$lists->delLink(5);
$lists->getLinkList();
echo "<br>-----------更新节点名称--------------<br>";
$lists->updateLink(3, "222222");
$lists->getLinkList();
echo "<br>-----------获取节点名称--------------<br>";
echo $lists->getLinkNameById(5);
echo "<br>-----------获取链表长度--------------<br>";
echo $lists->getLinkLength();