<?php

/**
 * 类 使用继承  public private protected 等关键字
 * 属性与方法
 * public 在类内部 或者 类生产对象 均可以访问
 *
 * private 当前类内部 能访问属性或者方法  子类不能继承（属性和方法均不能继承）
 *
 * protected 当前类 或者 子类 内部能访问属性或者方法  类生成对象后无法访问
 *
 * Class ShopProduct
 */
class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    protected $price;

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

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";

        return $base;
    }
}

class CDProduct extends ShopProduct
{
    public $playLength;

    function __construct($title, $firstName, $mainName, $price, $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    function getPlayLength()
    {
        return $this->playLength;
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";
        $base .= ": playing time - {$this->playLength}";

        return $base;
    }
}

class BookProduct extends ShopProduct
{
    private $numPages = 100;
    protected  $numPages2 = 200;

    function __construct($title, $firstName, $mainName, $price)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }


    function getNumPages(){
        return $this->numPages;
    }

    function getNumPages2(){
        return $this->numPages2;
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";
        $base .= ": page count - {$this->numPages}";

        return $base;
    }
}
$book = new BookProduct('My Antonia','Willa','Cather',5.99,10);

print($book->title);
exit;










