<?php
/**
 * Created by PhpStorm.
 * User: MrC
 * Date: 19/4/14
 * Time: 下午11:15
 */
include_once "MovieClass.php";

class RentalClass
{
    private $_movie;
    private $_dayRented;

    function __construct(MovieClass $oMovie, $dayRented)
    {
        $this->_movie = $oMovie;
        $this->_dayRented = $dayRented;
    }

    function getDayRented()
    {
        return $this->_dayRented;
    }

    function getMovie()
    {
        return $this->_movie;
    }
}