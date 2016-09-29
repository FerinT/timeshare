<?php
/*
 * The idea is that only this class calls the data manager which has the SQL in it,
 * This is the business logic for processing the Schedule
 *
*/
include "/../../dataaccess/ScheduleDAO.php";

class ProcessSchedule
{

    private $DataManagerObject;

    function __construct()
    {
        $this->DataManagerObject = new ScheduleDAO;
    }

    function saveSchedule($data)
    {
        $Schedule;
        $isTaken = false;

        for ($x = 0; $x < 84; $x++) {
            foreach ($data as $d) {
                if ((string)$x === $d) {
                    $Schedule[$x] = 1;
                    $isTaken = true;
                }
            }

            if ($isTaken == false) {
                $Schedule[$x] = 0;
            }
            $isTaken = false;

        }
        $ScheduleString = implode($Schedule, ',');
        $this->DataManagerObject->insertSchedule($ScheduleString);

    }

}

?>