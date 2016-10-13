<?php

include_once dirname(__FILE__) . "/../src/schedule/Schedule.php";

class ScheduleDAO
{

    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }

    public function insertSchedule($Arr)
    {
		$ScheduleString = implode($Arr, ',');
        $Sql = "INSERT INTO Schedule(ScheduleArray) VALUES('$ScheduleString')";
        $this->Connection->query($Sql);
		
		$id = $this->Connection->insert_id;
		
		return $id;
    }

    // Select a specific schedule by using a the primary key
    public function selectSchedule($Pk)
    {
        $Sql = "SELECT * FROM Schedule WHERE ScheduleID = $Pk";
        $Result = $this->Connection->query($Sql);
        $Row = $Result->fetch_assoc();

        $Data = explode(",", $Row['ScheduleArray']);
        $Table = new CreateCalendar;
        $Table->createCalendar($Data);

    }
	
	public function updateSchedule($ScheduleObject)
	{

		$arr = $ScheduleObject->getScheduleArray();
		$id = $ScheduleObject->getScheduleID();
		
		$Sql = "UPDATE Schedule SET ScheduleArray = '${arr}' WHERE ScheduleID = ${id}";
		
		$Result = $this->Connection->query($Sql);
	}

}


?>