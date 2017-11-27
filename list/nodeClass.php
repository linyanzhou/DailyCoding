<?php

//链表节点
class node
{
    public $id; //节点id
    public $name; //节点名称
    public $next; //下一节点

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->next = null;
    }
}