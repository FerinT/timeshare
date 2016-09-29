<?php
/*
 * This class acts as the main for now, This interacts with the datamanager via ProcessSchedule methods
 *
*/
//include("php/src/schedule/ProcessSchedule.php");
//include("php/src/schedule/CreateCalendar.php");
/*namespace schedule;
include 'CreateCalendar.php';*/

//namespace schedule;
include 'php/src/schedule/CreateCalendar.php';
include 'php/src/schedule/ProcessSchedule.php';
include 'php/dataaccess/ServiceDAO.php';
include 'php/src/service/Service.php';

if (isset($_POST['submit'])) {
    $data = $_POST['my_schedule'];
    $ProcessScheduleObject = new ProcessSchedule;
    $ProcessScheduleObject->saveSchedule($data);
}
?>

<html>

<body>

<form name="myForm" action="Main.php" method="POST">
    <table>
        <?php


        // This is how you make an empty array in order to create a "Default" empty calendar
        $arr = array_fill(0, 84, 0);
        $Table = new CreateCalendar();
        $Table->createCalendar($arr);

        $SDAO = new ServiceDAO();

        $Service = new Service();
        $Service->construct(3, 2, 3, 'TESTINSERT', 'TESTINSERT', 'TESTINSERT', 'TESTINSERT');


        $SDAO->insertService($Service);

        ?>

    </table>

    <p><input type='submit' name='submit' value='submit'/>

        <!-- Add select all and clear all fuctionality  -->

</form>

</body>
<html>