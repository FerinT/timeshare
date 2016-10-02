<?php

/**
 * Created by PhpStorm.
 * Date: 9/29/2016
 * Time: 12:03 PM
 */
class Service1
{

    private $ServiceId;
    private $Schedule;
    private $User;
    private $ServiceOffered;
    private $ServiceDescription;
    private $Category;
    private $RatePerHour;
    private $Location;
    private $SubCategories;

    public function __construct(){

    }
	
    public function construct($ServiceId, $Schedule, $User, $Category, $RatePerHour, $Location, $SubCategories)
    {
        $this->ServiceId = $ServiceId;
        $this->Schedule = $Schedule;
        $this->User = $User;
        $this->Category = $Category;
        $this->RatePerHour = $RatePerHour;
        $this->Location = $Location;
        $this->SubCategories = $SubCategories;
    }

    /**
     * @return mixed
     */
    public function getServiceOffered()
    {
        return $this->ServiceOffered;
    }

    /**
     * @param mixed $ServiceOffered
     */
    public function setServiceOffered($ServiceOffered)
    {
        $this->ServiceOffered = $ServiceOffered;
    }

    /**
     * @return mixed
     */
    public function getServiceDescription()
    {
        return $this->ServiceDescription;
    }

    public function setServiceDescription($ServiceDescription)
    {
        $this->ServiceDescription = $ServiceDescription;
    }

    public function getServiceId()
    {
        return $this->ServiceId;
    }

    public function setServiceId($ServiceId)
    {
        $this->ServiceId = $ServiceId;
    }

    public function getSchedule()
    {
        return $this->Schedule;
    }

    public function setSchedule($Schedule)
    {
        $this->Schedule = $Schedule;
    }

    public function getUser()
    {
        return $this->User;
    }


    public function setUser($User)
    {
        $this->User = $User;
    }

    public function getCategory()
    {
        return $this->Category;
    }

    /**
     * @param mixed $Category
     */
    public function setCategory($Category)
    {
        $this->Category = $Category;
    }

    /**
     * @return mixed
     */
    public function getRatePerHour()
    {
        return $this->RatePerHour;
    }

    /**
     * @param mixed $RatePerHour
     */
    public function setRatePerHour($RatePerHour)
    {
        $this->RatePerHour = $RatePerHour;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->Location;
    }

    /**
     * @param mixed $Location
     */
    public function setLocation($Location)
    {
        $this->Location = $Location;
    }

    /**
     * @return mixed
     */
    public function getSubCategories()
    {
        return $this->SubCategories;
    }

    /**
     * @param mixed $SubCategories
     */
    public function setSubCategories($SubCategories)
    {
        $this->SubCategories = $SubCategories;
    }

    


}