<?php

/*
 * This class is purely used to display the Calendar on various forms 
 *
*/

class CreateCalendar
{

    private $Time = 8;
    private $Days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    private $cnt = 0;

    function __construct()
    {
    }

   public function createCalendar($arr)
    {
		
        echo "<table><td>";
        echo "</td>";
        foreach ($this->Days as $Day) {
            echo "<th colspan='3'>" . $Day . "</th>";
        }

        for ($y = 0; $y < 12; $y++) {
            echo "<tr>";

            echo "<td>" . $this->Time . "h00" . " - " . $this->Time . "h00";
            $this->Time++;
            foreach ($this->Days as $Day) {
                if ((string)$arr[$this->cnt] == '0') {
                    echo "<td colspan='3'style='text-align:center;'>
					<input type='checkbox' name='my_schedule[]' value= '$this->cnt' style='outline:10px'/> 
				</td>";
                } else {
                    echo "<td colspan='3'style='text-align:center;'>
					<input type='checkbox' name='my_schedule[]' value= '$this->cnt' style='outline:10px' checked/> 
				</td>";
                }
                $this->cnt++;
            }

            echo "</tr>";

        }
		echo"</table>";
    }


}

?>