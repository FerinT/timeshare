<?php

class TransactionDAO
{

    //Transaction Object
    private $orderInformation;

    // Cart of Items to process
    private $cart;

    //Database Connection
    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }

    /**
     * TransactionDAO constructor.
     */
    public function saveTransaction($orderInformation, $cart)
    {
        $this->orderInformation = $orderInformation;
        $this->cart = $cart;
        $BuyerID = $orderInformation->getBuyerID();
        $DateofSale = $orderInformation->getDateOfSale();

        $Sql = "INSERT INTO TRANSACTION (BuyerID,DateOfSale) VALUES ('$BuyerID','$DateofSale')";
        $transactionID =  $this->Connection->query($Sql);


        foreach ($cart as $item) {

            $ServiceID = $item->getAdvert()->getServiceId();
            $RatePerHour = $item->getAdvert()->getRatePerHour();

            $Sql = "INSERT INTO TransactionLine (ServiceID, TransactionID, RatePerHour, Quantity) VALUES ('$ServiceID','$transactionID','$RatePerHour','1')";
            $this->Connection->query($Sql);

        }

    }


}