<?php
include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO1.php";
include_once dirname(__FILE__) . "/php/src/service/Service1.php";
include_once dirname(__FILE__) . "/php/src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/php/src/schedule/CreateCalendar.php";

$Index = $_GET['index'];
session_start();
$ServiceArray = $_SESSION['ServiceArray'];



// Display Calendar
$Schedule = $ServiceArray[$Index]->getSchedule();
$ScheduleArray = explode(',',$Schedule->getScheduleArray());
$Table = new CreateCalendar();
$Table->createCalendar($ScheduleArray);


echo "</br><b>Rate Per Hour: R</b>". $ServiceArray[$Index]->getRatePerHour();

?>