	<?php
		include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";
		
		if(isset($_POST['submit']))
		{
			include_once dirname(__FILE__) . "/../php/src/schedule/ProcessSchedule.php";
			
			
			if (!isset($_POST['my_schedule'])){
				echo '<script type="text/javascript">alert("You have not selected any timeslots!");</script>';
			}
					
			else
			{
				$userSchedule = $_POST['my_schedule'];
				$ProcessScheduleObject = new ProcessSchedule();
				$arr = $ProcessScheduleObject->processSchedule($userSchedule);
				echo"save function must still be implemented, when we can access who the user is thats logged in";
				
				// STEPS TO SAVE AN ADVERT 
				// get the userID
				// save the schedule and return the scheduleID
				// save the service 
				
				// save the thing
			}
		}

				
	?>
	
	
<html>
<head>
	 <script type="text/javascript" src="../javascript/Formvalidation.js">
    </script>
</head>

<body>
	

	<form name="createAdvertform" action="CreateAdvert.php" method="POST" onsubmit="return isValidCreateAdvert();">
		
		<?php
		// Displays the blank calendar
	
		$arr = array_fill(0, 84, 0);
        $Table = new CreateCalendar();
        $Table->createCalendar($arr);			
		?>
		
		
	<p>Please select a Category: 
	<select name="categoryType">
		<option value="education">Education</option>
		<option value="entertainment">Entertainment</option>
		<option value="business">Business</option>
		<option value="other">Other</option>
	</select> </p>
	<p>Price per hour :R <input type='number' name='pricePerHour' value=''/></p>
	<p>Type of service offered: ( ie Math tutor, DJ) <input type='text' name='typeOfService' value=''/> </p>
	<p>Short description<textarea name="shortDescription" cols="25" rows="5"> </textarea></p>
	<p><input type='submit' name='submit' value='submit' /></p>
</form>
	
</body>


</html>