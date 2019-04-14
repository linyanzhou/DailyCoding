<?php

/**
 * Created by PhpStorm.
 * User: MrC
 * Date: 19/4/14
 * Time: 下午11:14
 */
class MovieClass
{
    static $children = 2;
    static $regular = 0;
    static $newRelease = 1;

    private $_title;
    private $_priceCode;

    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->_priceCode = $priceCode;
    }

    public function getPriceCode()
    {
        return $this->_priceCode;
    }

    public function setPriceCode($arg)
    {
        $this->_priceCode = $arg;
    }

    public function getTitle()
    {
        return $this->_title;
    }
}
