<?php


class Schedule
{
    private $ScheduleID;
    private $ScheduleArray;

	public function __construct(){
	}

    public function getScheduleID()
    {
        return $this->ScheduleID;
    }

    public function setScheduleID($ScheduleID)
    {
        $this->ScheduleID = $ScheduleID;
    }

    public function getScheduleArray()
    {
        return $this->ScheduleArray;
    }

    public function setScheduleArray($ScheduleArray)
    {
        $this->ScheduleArray = $ScheduleArray;
    }

}