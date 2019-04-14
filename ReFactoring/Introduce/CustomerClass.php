<?php

include_once "RentalClass.php";

class CustomerClass
{
    private $_name;
    private $_rentalArr = [];

    function __construct($name)
    {
        $this->_name = $name;
    }

    function addRental(RentalClass $rental)
    {
        $this->_rentalArr[] = $rental;
    }

    function getName()
    {
        return $this->_name;
    }

    function statement()
    {
        $iTotalAmount = 0;
        $iFrequentRenterPoint = 0;
        $aRentals = $this->_rentalArr;
        $sResult = "Rental record for :" . $this->getName() . "\n";
        foreach ($aRentals as $k => $oRentals) {
            $iThisAmount = 0;
            switch ($oRentals->getMovie()->getPriceCode()) {
                case MovieClass::$regular:
                    $iThisAmount += 2;
                    if ($oRentals->getDayRented() > 2) {
                        $iThisAmount += ($oRentals->getDayRented() - 2) * 1.5;
                    }
                    break;
                case MovieClass::$newRelease:
                    $iThisAmount = $iThisAmount + ($oRentals->getDayRented() * 3);
                    break;
                case MovieClass::$children:
                    $iThisAmount += 1.5;
                    if ($oRentals->getDayRented() > 2) {
                        $iThisAmount += ($oRentals->getDayRented() - 3) * 1.5;
                    }
                    break;
            }
            $iFrequentRenterPoint++;
            $sResult .= "\t" . $oRentals->getMovie()->getTitle() . "\t" . $iThisAmount . "\n";

            $iTotalAmount += $iThisAmount;
        }

        $sResult .= " Amount owed is " . $iTotalAmount;
        $sResult .= " You earned " . $iFrequentRenterPoint . " frequent renter point";

        return $sResult;
    }
}

$oMovie1 = new MovieClass('cc1', 1);
$oMovie2 = new MovieClass('cc2', 2);

$oCustomer = new CustomerClass("mrc");
$oRental1 = new RentalClass($oMovie1, 3);
$oRental2 = new RentalClass($oMovie2, 6);
$oCustomer->addRental($oRental1);
$oCustomer->addRental($oRental2);
var_dump($oCustomer->statement());
exit;