<?php

/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 9/29/2016
 * Time: 12:04 PM
 */

include_once dirname(__FILE__) . "/../src/service/Service1.php";
include_once dirname(__FILE__) . "/../src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/../src/user/User.php";

class ServiceDAO1
{
    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }

    public
    function selectAllServices()
    {

        $Sql = "SELECT * FROM Service AS ser INNER JOIN user u ON ser.ServiceID = u.userid INNER JOIN schedule sch ON ser.ServiceID = sch.ScheduleID";
        $Result = $this->Connection->query($Sql);

        if (!$Result) {
            //die('Could not get data: ' . mysql_error());
        } else {
            $ServiceArray = array();
            while ($Row = $Result->fetch_assoc()) {
				//echo $Row['name'];
                $ServiceFound = new Service1();
                $ServiceFound->setServiceDescription($Row['ServiceDescription']);
                $ServiceFound->setServiceOffered($Row['ServiceOffered']);
                $ServiceFound->setServiceId($Row['ServiceID']);
                $ServiceFound->setCategory($Row['Category']);
                $ServiceFound->setLocation($Row['Location']);
                $ServiceFound->setRatePerHour($Row['RatePerHour']);
                $ServiceFound->setSubCategories($Row['SubCategories']);
				
				// user object
				$UserObject = new User;
				$UserObject->setUserId($Row['UserID']);
				$UserObject->setEmailAddress($Row['emailaddress']);
				$UserObject->setName($Row['name']);
				$UserObject->setPassword($Row['password']);
				$UserObject->setProfilePicture($Row['profilepicture']);
				$ServiceFound->setUser($UserObject);
				
				// Schedule object
				$ScheduleObject = new Schedule;
				$ScheduleObject->setScheduleID($Row['ScheduleID']);
                $ScheduleObject->setScheduleArray($Row['ScheduleArray']);
                $ServiceFound->setSchedule($ScheduleObject);

                array_push($ServiceArray, $ServiceFound); 

            }
        }
		return $ServiceArray;
    }

    
}


