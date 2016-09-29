<?php

/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 9/29/2016
 * Time: 12:04 PM
 */
class ServiceDAO
{
    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }

    public function insertService($Service)
    {
        $ServiceId = $Service->getServiceId();
        $ScheduleId = $Service->getScheduleID();
        $UserId = $Service->getUserId();
        $Category = $Service->getCategory();
        $RatePerHour = $Service->getRatePerHour();
        $Location = $Service->getLocation();
        $SubCategories = $Service->getSubCategories();


        $Sql = "INSERT INTO service ( ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
        VALUES ( ${ScheduleId}, ${UserId}, '${Category}', '${RatePerHour}', '${Location}', '${SubCategories}')";

        $this->Connection->query($Sql);
    }

    // Select a specific schedule by using a the primary key
    public function selectService($Pk)
    {
        $Sql = "SELECT * FROM Schedule WHERE ScheduleID = $Pk";
        $Result = $this->Connection->query($Sql);
        $Row = $Result->fetch_assoc();
        $Data = explode(",", $Row['ScheduleArray']);
        $Table = new CreateCalendar;
        $Table->createCalendar($Data);

    }

    public function selectAllServices()
    {

    }

    public function selectAllServicesForUser($UserId)
    {

    }

    public function selectServicesByCategory($Category)
    {

    }

}