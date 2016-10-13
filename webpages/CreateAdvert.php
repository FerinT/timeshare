<?php

if(session_id() == '') {
   session_start();
}

		include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";
		
		if(isset($_POST['submit']))
		{
			include_once dirname(__FILE__) . "/../php/src/schedule/ProcessSchedule.php";
			include_once dirname(__FILE__) . "/../php/src/service/Service.php";
			include_once dirname(__FILE__) . "/../php/dataaccess/ScheduleDAO.php";
			include_once dirname(__FILE__) . "/../php/dataaccess/ServiceDAO.php";
			
			
			if (!isset($_POST['my_schedule'])){
				echo '<script type="text/javascript">alert("You have not selected any timeslots!");</script>';
			}
					
			else
			{
				$ScheduleDAOobject = new ScheduleDAO();
				$ServiceDAOobject = new ServiceDAO();
				$ServiceOject = new Service();
				
				$userSchedule = $_POST['my_schedule'];
				$ProcessScheduleObject = new ProcessSchedule();
				$arr = $ProcessScheduleObject->processSchedule($userSchedule);
				
				
				echo"save function must still be implemented, when we can access who the user is thats logged in";
				
				$UserID  = $_SESSION['userID'];
				$ScheduleID = $ScheduleDAOobject->insertSchedule($arr);
				
				$ServiceOject->setUserId($UserID);
				$ServiceOject->setScheduleId($ScheduleID);
				$ServiceOject->setCategory($_POST['categoryType']);
				$ServiceOject->setRatePerHour($_POST['pricePerHour']);
				$ServiceOject->setLocation($_POST['location']);
				$ServiceOject->setServiceOffered($_POST['typeOfService']);
				$ServiceOject->setServiceDescription($_POST['shortDescription']);
				$ServiceOject->setSubCategories("NA");
				
				
				$ServiceDAOobject->insertService($ServiceOject);
				
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
	<p>Location: <input type='text' name='location' value=''/></p>
	<p>Type of service offered: ( ie Math tutor, DJ) <input type='text' name='typeOfService' value=''/> </p>
	<p>Short description<textarea name="shortDescription" cols="25" rows="5"> </textarea></p>
	<p><input type='submit' name='submit' value='submit' /></p>
</form>
	
</body>


</html>