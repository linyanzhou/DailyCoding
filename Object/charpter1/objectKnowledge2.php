<?php

/**
 * 类  构造方法
 * Class ShopProduct
 */
class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $firstName, $mainName, $price)
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    function getProducer()
    {
        return "{$this->producerFirstName}" . "{$this->producerMainName}";
    }
}
$product1 = new ShopProduct('My Antonia','Willa','Cather',5.99);
print "author :".$product1->getProducer();exit;