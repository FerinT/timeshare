<?php

/**
 * Created by PhpStorm.
 * Date: 9/29/2016
 * Time: 12:03 PM
 */
class Service
{

    /**
     * @var
     */
    private $ServiceId;
    /**
     * @var
     */
    private $ScheduleId;
    /**
     * @var
     */
    private $UserId;
    /**
     * @var
     */
    private $ServiceOffered;
    /**
     * @var
     */
    private $ServiceDescription;
    /**
     * @var
     */
    private $Category;
    /**
     * @var
     */
    private $RatePerHour;
    /**
     * @var
     */
    private $Location;
    /**
     * @var
     */
    private $SubCategories;

    public function __construct(){

    }
    /**
     * Service constructor.
     * @param $ServiceId
     * @param $ScheduleId
     * @param $userId
     * @param $Category
     * @param $RatePerHour
     * @param $Location
     * @param $SubCategories
     */
    public function construct($ServiceId, $ScheduleId, $userId, $Category, $RatePerHour, $Location, $SubCategories)
    {
        $this->ServiceId = $ServiceId;
        $this->ScheduleId = $ScheduleId;
        $this->UserId = $userId;
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

    /**
     * @param mixed $ServiceDescription
     */
    public function setServiceDescription($ServiceDescription)
    {
        $this->ServiceDescription = $ServiceDescription;
    }

    
    /**
     * @return mixed
     */
    public function getServiceId()
    {
        return $this->ServiceId;
    }

    /**
     * @param mixed $ServiceId
     */
    public function setServiceId($ServiceId)
    {
        $this->ServiceId = $ServiceId;
    }

    /**
     * @return mixed
     */
    public function getScheduleId()
    {
        return $this->ScheduleId;
    }

    /**
     * @param mixed $ScheduleId
     */
    public function setScheduleId($ScheduleId)
    {
        $this->ScheduleId = $ScheduleId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param mixed $UserId
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
    }

    /**
     * @return mixed
     */
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