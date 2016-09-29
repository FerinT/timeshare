<?php
//include('CreateCalendar.php');
//include 'C:\xampp\htdocs\timeshare\php\src\schedule\CreateCalendar.php';
use Schedule\CreateCalendar;


class DataManager
{

    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }

    public function insertSchedule($arr)
    {
        $sql = "INSERT INTO Schedule(ScheduleArray) VALUES('$arr')";
        $this->Connection->query($sql);
    }

    // Select a specific schedule by using a the primary key
    public function selectSchedule($pk)
    {
        $sql = "SELECT * FROM Schedule WHERE ScheduleID = $pk";
        $Result = $this->Connection->query($sql);
        $row = $Result->fetch_assoc();

        $data = explode(",", $row['ScheduleArray']);
        $Table = new CreateCalendar;
        $Table->createCalendar($data);

    }

}


?>