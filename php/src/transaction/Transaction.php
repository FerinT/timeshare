<?php

/**
 * Created by PhpStorm.
 * User: Brandonhome
 * Date: 2016/10/17
 * Time: 4:26 PM
 */
class Transaction
{
    private $TransactionID;
    private $BuyerID;
    private $DateOfSale;


    /**
     * Transaction constructor.
     * @param $BuyerID
     * @param $DateOfSale
     * @param $TotalPrice
     */
    public function __construct($BuyerID, $DateOfSale)
    {
        $this->BuyerID = $BuyerID;
        $this->DateOfSale = $DateOfSale;
    }


    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->TransactionID;
    }

    /**
     * @param mixed $TransactionID
     */
    public function setTransactionID($TransactionID)
    {
        $this->TransactionID = $TransactionID;
    }

    /**
     * @return mixed
     */
    public function getBuyerID()
    {
        return $this->BuyerID;
    }

    /**
     * @param mixed $BuyerID
     */
    public function setBuyerID($BuyerID)
    {
        $this->BuyerID = $BuyerID;
    }

    /**
     * @return mixed
     */
    public function getDateOfSale()
    {
        return $this->DateOfSale;
    }

    /**
     * @param mixed $DateOfSale
     */
    public function setDateOfSale($DateOfSale)
    {
        $this->DateOfSale = $DateOfSale;
    }
    
}