<?php
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