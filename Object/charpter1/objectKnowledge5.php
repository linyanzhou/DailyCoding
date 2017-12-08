<?php

/**
 * 类 使用继承
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










