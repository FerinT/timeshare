<?php


include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/php/src/service/Service.php";
include_once dirname(__FILE__) . "/php/src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/php/src/schedule/CreateCalendar.php";

if (isset($_POST['submit'])) {

    include_once dirname(__FILE__) . "/php/src/schedule/ProcessSchedule.php";
    $ProcessScheduleObject = new ProcessSchedule();


    // This the array of what the user checked to buy
    $tmp = $_POST['my_schedule'];
    $BuyingSchedule = $ProcessScheduleObject->processSchedule($tmp);

    // The original schedule posted by the user
    $ScheduleArray = $_POST['originalSchedule'];
    $SellingSchedule = explode(',', $ScheduleArray);

    // returns the indexes of "timeslots" selected by the user
    $arr = $ProcessScheduleObject->compareSchedule($BuyingSchedule, $SellingSchedule);

    if (session_id() == '') {
        session_start();
    }

    $_SESSION['indexes'] = $arr;

    include("ProcessIndexes.php");

    echo "added to cart successfully";

    exit();
}


?>

<html>
<body>
<br>
<form name="advertDeatilsForm" action="AdvertDetails.php" method="POST">
    <?php
    $Index = $_GET['index'];
    if (session_id() == '') {
        session_start();
    }
    $ServiceArray = $_SESSION['ServiceArray'];
    $_SESSION['advertObject'] = $ServiceArray[$Index];

    // Display Calendar
    $Schedule = $ServiceArray[$Index]->getSchedule();
    $ScheduleArray = explode(',', $Schedule->getScheduleArray());
    $Table = new CreateCalendar();
    $Table->createCalendar($ScheduleArray);

    // This deals with passing the original array on form submit
    // impode it back into a sting so that we can pass it via $_POST
    $Data = implode(',', $ScheduleArray);
    echo '<input type="hidden" name="originalSchedule" value="' . $Data . '" >';

    ?>
    <input type='submit' name='submit' value='Purchase'/>
</form>
<input type='button' name='viewcart' value='viewcart'
       onclick="window.location.href='/timeshare/php/src/cart/DisplayCart.php'"/>
<div class='alert alert-warning text-align-center spaces-bottom'>
    <h3>Rate Per Hour: R<?php echo $ServiceArray[$Index]->getRatePerHour() ?></h3>
</div>
<br/><br/><br/><br/>
<div class='alert alert-info footer'>
    <p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
</div>
</body>
</html>


