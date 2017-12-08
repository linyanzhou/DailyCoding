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
    protected $numPages = 100;

    function __construct($title, $firstName, $mainName, $price)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }


    function getNumPages(){
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
$book = new BookProduct('My Antonia','Willa','Cather',5.99,10);

print($book->getSummaryLine());
exit;










