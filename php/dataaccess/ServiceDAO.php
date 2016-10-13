<?php

include_once dirname(__FILE__) . "/../src/service/Service.php";
include_once dirname(__FILE__) . "/../src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/../src/user/User.php";

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

		
		$sql = "INSERT INTO Service (ScheduleID, UserID, ServiceOffered, ServiceDescription, Category, RatePerHour, Location, SubCategories) VALUES (${ScheduleId}, ${UserId} ,'${ServiceOffered}','${ServiceDescription}','${Category}','${RatePerHour}','${Location}','${SubCategories}')";
		

        $Result = $this->Connection->query($sql);
		
    }

    // Select a specific schedule by using a the primary key
    public function selectServiceById($Pk)
    {
		$Sql = "SELECT * FROM Service AS ser INNER JOIN user u ON ser.UserID = u.userid INNER JOIN Schedule sch ON ser.ScheduleID = sch.ScheduleID WHERE ser.ServiceID = $Pk";
        //$Sql = "SELECT * FROM Service WHERE ServiceID = $Pk;";
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

                //array_push($ServiceArray, $ServiceFound);


            }
			return $ServiceFound;
           
        }

		
    }


 public
    function selectAllServices()
    {

        $Sql = "SELECT * FROM Service AS ser INNER JOIN user u ON ser.UserID = u.userid INNER JOIN Schedule sch ON ser.ScheduleID = sch.ScheduleID";
        $Result = $this->Connection->query($Sql);

        if (!$Result) {
            //die('Could not get data: ' . mysql_error());
        } else {
            $ServiceArray = array();
            while ($Row = $Result->fetch_assoc()) {
				//echo $Row['name'];
                $ServiceFound = new Service();
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
        
			return $ServiceArray;
		}
    }

    public
    function selectAllServicesForUser($UserId)
    {

        //$Sql = "SELECT * FROM Service WHERE UserID = $UserId;";
		$Sql = "SELECT * FROM Service AS ser INNER JOIN user u ON ser.UserID = u.userid INNER JOIN Schedule sch ON ser.ScheduleID = sch.ScheduleID WHERE ser.UserID = $UserId";
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
        	return $ServiceArray;  
            
        }
       

    }

    public
    function selectServicesByCategory($Category)
    {
		$Sql = "SELECT * FROM Service AS ser INNER JOIN user u ON ser.UserID = u.userid INNER JOIN Schedule sch ON ser.ScheduleID = sch.ScheduleID WHERE Category LIKE '%$Category%'";
        //$Sql = "SELECT * FROM Service WHERE Category LIKE '%$Category%';";
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
           return $ServiceArray;
        }
		
    }
}


