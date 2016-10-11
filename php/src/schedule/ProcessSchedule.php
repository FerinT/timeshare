<?php

// this needs to just be a php script not a class

class ProcessSchedule
{


    function __construct()
    {
        
    }

    function processSchedule($data)
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
   		return $Schedule;
    }
}

?>