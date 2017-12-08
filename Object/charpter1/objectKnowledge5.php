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

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";

        return $base;
    }
}

class CDProduct extends ShopProduct
{
    protected $playLength;

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
    protected $numPages = 100;

    function __construct($title, $firstName, $mainName, $price)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }


    function getNumPages()
    {
        return $this->numPages;
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";
        $base .= ": page count - {$this->numPages}";

        return $base;
    }
}

$book = new BookProduct('My Antonia', 'Willa', 'Cather', 5.99);

print($book->numPages);
exit;

/**
 *
 * 无论 $numPages 的属性 是 private 还是protected
 * Fatal error: Uncaught Error: Cannot access private property BookProduct::$numPages in /Users/MrC/Test/DailyCoding/Object/charpter1/objectKnowledge5.php:88 Stack trace: #0 {main} thrown in /Users/MrC/Test/DailyCoding/Object/charpter1/objectKnowledge5.php on line 88
 * Fatal error: Uncaught Error: Cannot access protected property BookProduct::$numPages in /Users/MrC/Test/DailyCoding/Object/charpter1/objectKnowledge5.php:88 Stack trace: #0 {main} thrown in /Users/MrC/Test/DailyCoding/Object/charpter1/objectKnowledge5.php on line 88
 */










