<?php


include_once dirname(__FILE__) . "/../php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/../php/src/service/Service.php";
include_once dirname(__FILE__) . "/../php/src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";

if (isset($_POST['submit'])) {

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


    header('Location: DisplayAdverts.php');
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
    // implode it back into a sting so that we can pass it via $_POST
    $Data = implode(',', $ScheduleArray);
    echo '<input type="hidden" name="originalSchedule" value="' . $Data . '" >';

    ?>

    <input type='button' name='button' value='Add to cart' data-toggle="modal" data-target="#myModal"/>

    <div class='alert alert-warning text-align-center spaces-bottom'>
        <h3>Rate Per Hour: R<?php echo $ServiceArray[$Index]->getRatePerHour() ?></h3>
    </div>
    <br/><br/><br/><br/>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog middle-buttons panel custom-panel">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title page-header"><b>My Cart Details</b></h4>
                </div>
                <div align="center" class="modal-body">
                    <p>Items Have Been Successfully Added To Cart!</p>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-default" value="Thanks, I Want More"/>
                    <input type="button" name="goToCart" class="btn btn-default" value="No Thanks, Take me to my cart" onclick="window.location.href ='/timeshare/pages/DisplayCart.php'"/>
                </div>
            </div>
        </div>
    </div>
</form>

<div class='alert alert-info footer'>
    <p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
</div>

<script src="/timeshare/js/Formvalidation.js"></script>
<script src="/timeshare/js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/timeshare/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/timeshare/js/tether.min.js"></script>
<script src="/timeshare/js/bootstrap.min.js"></script>

</body>
</html>


