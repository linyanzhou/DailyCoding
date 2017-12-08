<?php

/**
 * 类 定义方法
 * Class ShopProduct
 */

class ShopProduct
{
    public $title = "default product";
    public $producerMainName = "main name";
    public $producerFirstName = "first name";
    public $price = 0;

    function getProducer()
    {
        return "{$this->producerFirstName}" . "{$this->producerMainName}";
    }
}

$product1 = new ShopProduct();
$product1->price = 5.99;
$product1->producerFirstName = "Willa";
$product1->producerMainName = "Cather";
print "author :".$product1->getProducer();exit;