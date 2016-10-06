<?php
include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/php/src/service/Service.php";
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


echo "</br><div class='alert alert-warning text-align-center spaces-bottom'><h3>Rate Per Hour: R". $ServiceArray[$Index]->getRatePerHour() . "</h3></div><br/><br/><br/><br/><div class='alert alert-info footer'>
				<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
				</div></body></html>";

?>