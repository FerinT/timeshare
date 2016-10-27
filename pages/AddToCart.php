<?php
/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 10/27/2016
 * Time: 5:41 PM
 */
include_once dirname(__FILE__) . "/../php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/../php/src/service/Service.php";
include_once dirname(__FILE__) . "/../php/src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";
include_once dirname(__FILE__) . "/../php/src/schedule/ProcessSchedule.php";

$ProcessScheduleObject = new ProcessSchedule();


// This the array of what the user checked to buy
$tmp = $_POST['my_schedule'];
$BuyingSchedule = $ProcessScheduleObject->processSchedule($tmp);

// The original schedule posted by the user
$ScheduleArray = $_POST['originalSchedule'];
$SellingSchedule = explode(',', $ScheduleArray);

if ($BuyingSchedule == $SellingSchedule) {
    echo "<script type=\"text/javascript\">window.alert('You did not select any timeslots!');window.location.href = 'DisplayAdverts.php';</script>";
}


// returns the indexes of "timeslots" selected by the user
$arr = $ProcessScheduleObject->compareSchedule($BuyingSchedule, $SellingSchedule);

if (session_id() == '') {
    session_start();
}

$_SESSION['indexes'] = $arr;

include("/../ProcessIndexes.php");

header('Location: DisplayCart.php');

exit();


?>