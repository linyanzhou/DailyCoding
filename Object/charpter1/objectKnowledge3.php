<?php

/**
 * 类  构造方法  以及 获取提示：对象类型
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

class  ShopProductWrite {
    public function write(ShopProduct $shopProduct){
        $str = "$shopProduct->title:".$shopProduct->getProducer().$shopProduct->price;
        return $str;
    }
}
$product = new ShopProduct('My Antonia','Willa','Cather',5.99);
$writer = new ShopProductWrite();
print $writer->write($product);exit;

