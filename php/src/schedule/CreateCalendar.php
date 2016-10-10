<?php

/*
 * This class is purely used to display the Calendar on various forms 
 *
*/

include dirname(__FILE__) . '/../../../pages/header.php';

class CreateCalendar
{

    private $Time = 8;
    private $Days = array("Monday", "Tuesday  ", "Wednesday", "Thursday ", "Friday   ", "Saturday ", "Sunday   ");
    private $cnt = 0;

    function __construct()
    {
    }

   public function createCalendar($arr)
    {
		
		echo '<div class="container spaces-top"><div class="table-responsive">';
		
        echo "<table class='table table-bordered'><td class='table-border-color'>";
        echo "</td>";
        foreach ($this->Days as $Day) {
            echo "<th class='custom-row-header' colspan='3'>" . $Day . "</th>";
        }

        for ($y = 0; $y < 12; $y++) {
            echo "<tr>";

            echo "<td class='text-align-center'><b>" . $this->Time . "h00" . " - " . ($this->Time+1) . "h00</b>";
            $this->Time++;
			$color_negative="#d9534f";
			$color_positive="#5cb85c";
            foreach ($this->Days as $Day) {
                if ((string)$arr[$this->cnt] == '0') {              
					echo "<td colspan='3'><input type='checkbox' name='my_schedule[]' value= '$this->cnt' style='outline:10px;'";
					if(basename($_SERVER['PHP_SELF']) != 'CreateAdvert.php')
						echo" onclick='return false'; disabled='disabled';";
				echo"/></td>";
                } else {
					echo"<td colspan='3'><input type='checkbox' name='my_schedule[]' value= '$this->cnt' style='outline:10px' checked/>
				</td>";
                }
                $this->cnt++;
            }

            echo "</tr>";

        }
		echo"</table></div></div>";
	
    }


}

?>