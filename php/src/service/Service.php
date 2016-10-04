<?php
include_once dirname(__FILE__) . "/../../src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/../../src/user/User.php";

class Service
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

	// strictly to accommodate the insert statements in ServiceDAO
	public function getUserId()
	{
		return $this->User->getUserId();
	}
	// strictly to accommodate the insert statements in ServiceDAO
	public function getScheduleId()
	{
		return $this->Schedule->getScheduleID();
	}
	
    public function getServiceOffered()
    {
        return $this->ServiceOffered;
    }

    public function setServiceOffered($ServiceOffered)
    {
        $this->ServiceOffered = $ServiceOffered;
    }

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

    public function setCategory($Category)
    {
        $this->Category = $Category;
    }

    public function getRatePerHour()
    {
        return $this->RatePerHour;
    }

    public function setRatePerHour($RatePerHour)
    {
        $this->RatePerHour = $RatePerHour;
    }

    public function getLocation()
    {
        return $this->Location;
    }

    public function setLocation($Location)
    {
        $this->Location = $Location;
    }

    public function getSubCategories()
    {
        return $this->SubCategories;
    }
	
    public function setSubCategories($SubCategories)
    {
        $this->SubCategories = $SubCategories;
    }

    


}