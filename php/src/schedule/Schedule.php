<?php

/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 9/29/2016
 * Time: 2:55 PM
 */
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