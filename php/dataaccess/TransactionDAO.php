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

        $Sql = "INSERT INTO Transaction (BuyerID,DateOfSale) VALUES ('$BuyerID','$DateofSale')";
        $this->Connection->query($Sql);
        $transactionID = $this->Connection->insert_id;


        foreach ($cart as $item) {

            $ServiceID = $item->getAdvert()->getServiceId();
            $RatePerHour = $item->getAdvert()->getRatePerHour();
            $Day = $item->getDay();
            $Time = $item->getTime();

            $Sql = "INSERT INTO TransactionLine (ServiceID, TransactionID, RatePerHour, Quantity, Day, Time) VALUES ('$ServiceID','$transactionID','$RatePerHour','1', '$Day','$Time' )";
            $this->Connection->query($Sql);

        }

        return $transactionID;
    }


}