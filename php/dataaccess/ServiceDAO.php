<?php

/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 9/29/2016
 * Time: 12:04 PM
 */
include_once dirname(__FILE__) . "/../src/service/Service.php";

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
        $ServiceDescription = $Service->getServiceDescription();
        $ServiceOffered = $Service->getServiceOffered();

        $Sql = "INSERT INTO service ( ScheduleID, UserID,ServiceOffered, ServiceDescription ,Category, RatePerHour, Location, SubCategories)
        VALUES ( ${ScheduleId}, ${UserId},${ServiceOffered},${ServiceDescription}, '${Category}', '${RatePerHour}', '${Location}', '${SubCategories}')";

        $this->Connection->query($Sql);
    }

    // Select a specific schedule by using a the primary key
    public function selectServiceById($Pk)
    {
        $Sql = "SELECT * FROM Service WHERE ServiceID = $Pk;";
        $Result = $this->Connection->query($Sql);

        //$Row = $Result->fetch_assoc();
        if (!$Result) {
            //die('Could not get data: ' . mysql_error());
        } else {
            $ServiceArray = array();
            while ($Row = $Result->fetch_assoc()) {
                $ServiceFound = new Service();
                $ServiceFound->setServiceDescription($Row['ServiceDescription']);
                $ServiceFound->setServiceOffered($Row['ServiceOffered']);
                $ServiceFound->setServiceId($Row['ServiceID']);
                $ServiceFound->setCategory($Row['Category']);
                $ServiceFound->setLocation($Row['Location']);
                $ServiceFound->setRatePerHour($Row['RatePerHour']);
                $ServiceFound->setSubCategories($Row['SubCategories']);
                $ServiceFound->setScheduleId($Row['ScheduleID']);
                $ServiceFound->setUserId($Row['UserID']);

                array_push($ServiceArray, $ServiceFound);


            }
            foreach ($ServiceArray as $value) {
                print_r($value);
                echo "<br/><br/>";
            }
        }


    }


    public
    function selectAllServices()
    {

        $Sql = "SELECT * FROM Service;";
        $Result = $this->Connection->query($Sql);

        //$Row = $Result->fetch_assoc();
        if (!$Result) {
            //die('Could not get data: ' . mysql_error());
        } else {
            $ServiceArray = array();
            while ($Row = $Result->fetch_assoc()) {
                $ServiceFound = new Service();
                $ServiceFound->setServiceDescription($Row['ServiceDescription']);
                $ServiceFound->setServiceOffered($Row['ServiceOffered']);
                $ServiceFound->setServiceId($Row['ServiceID']);
                $ServiceFound->setCategory($Row['Category']);
                $ServiceFound->setLocation($Row['Location']);
                $ServiceFound->setRatePerHour($Row['RatePerHour']);
                $ServiceFound->setSubCategories($Row['SubCategories']);
                $ServiceFound->setScheduleId($Row['ScheduleID']);
                $ServiceFound->setUserId($Row['UserID']);

                array_push($ServiceArray, $ServiceFound);


            }
            foreach ($ServiceArray as $value) {
                print_r($value);
                echo "<br/><br/>";
            }
        }
    }

    public
    function selectAllServicesForUser($UserId)
    {

        $Sql = "SELECT * FROM Service WHERE UserID = $UserId;";
        $Result = $this->Connection->query($Sql);
        $ServiceArray = array();
        //$Row = $Result->fetch_assoc();
        if (!$Result) {
            //die('Could not get data: ' . mysql_error());
            
        } else {
            
            while ($Row = $Result->fetch_assoc()) {
                $ServiceFound = new Service();
                $ServiceFound->setServiceDescription($Row['ServiceDescription']);
                $ServiceFound->setServiceOffered($Row['ServiceOffered']);
                $ServiceFound->setServiceId($Row['ServiceID']);
                $ServiceFound->setCategory($Row['Category']);
                $ServiceFound->setLocation($Row['Location']);
                $ServiceFound->setRatePerHour($Row['RatePerHour']);
                $ServiceFound->setSubCategories($Row['SubCategories']);
                $ServiceFound->setScheduleId($Row['ScheduleID']);
                $ServiceFound->setUserId($Row['UserID']);

                array_push($ServiceArray, $ServiceFound);


            }
            foreach ($ServiceArray as $value) {
                print_r($value);
                echo "<br/><br/>";
            }
            
        }
        return $ServiceArray;

    }

    public
    function selectServicesByCategory($Category)
    {
        $Sql = "SELECT * FROM Service WHERE Category LIKE '%$Category%';";
        $Result = $this->Connection->query($Sql);

        //$Row = $Result->fetch_assoc();
        if (!$Result) {
            //die('Could not get data: ' . mysql_error());
        } else {
            $ServiceArray = array();
            while ($Row = $Result->fetch_assoc()) {
                $ServiceFound = new Service();
                $ServiceFound->setServiceDescription($Row['ServiceDescription']);
                $ServiceFound->setServiceOffered($Row['ServiceOffered']);
                $ServiceFound->setServiceId($Row['ServiceID']);
                $ServiceFound->setCategory($Row['Category']);
                $ServiceFound->setLocation($Row['Location']);
                $ServiceFound->setRatePerHour($Row['RatePerHour']);
                $ServiceFound->setSubCategories($Row['SubCategories']);
                $ServiceFound->setScheduleId($Row['ScheduleID']);
                $ServiceFound->setUserId($Row['UserID']);

                array_push($ServiceArray, $ServiceFound);


            }
            foreach ($ServiceArray as $value) {
                print_r($value);
                echo "<br/><br/>";
            }
        }

    }
}


