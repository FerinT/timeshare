<?php

		include_once dirname(__FILE__) . "/../php/src/schedule/ProcessSchedule.php";
		include_once dirname(__FILE__) . "/../php/src/service/Service.php";
		include_once dirname(__FILE__) . "/../php/dataaccess/ScheduleDAO.php";
		include_once dirname(__FILE__) . "/../php/dataaccess/ServiceDAO.php";

		include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";

		if(session_id() == '') {
		   session_start();
		}

		if(!isset($_SESSION['username']) || $_SESSION['username'] == null)
		{
			echo "<script type=\"text/javascript\">window.alert('You must be a registered user.');window.location.href = 'index.php';</script>";
		}

		if(isset($_POST['submit']))
		{


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
				header( 'Location: DisplayAdverts.php' ) ;
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
	 <script type="text/javascript" src="../js/Formvalidation.js" />

    </script>
</head>

<body>
    <div style="margin-top:80px!important">
           <form name="createAdvertform" action="CreateAdvert.php" method="POST" onsubmit="return isValidCreateAdvert();">
                <div class="row">
                    <div class="col-md-3">
                            <div class="spaces-left panel panel-primary" style="padding:15px; margin-left:80px; margin-top:40px!important">
                            <br />
                                <p>Please select a Category:
                                <select name="categoryType">
                                <option value="education">Education</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="business">Business</option>
                                <option value="other">Other</option>
                                </select> </p>
                                <p>Price per hour :R <input type='number' class="form-control custom-control" name='pricePerHour' value=''/></p>
                                <p>Location: <input type='text' class="form-control custom-control" name='location' value=''/></p>
                                <p>Type of service offered: ( ie Math tutor, DJ) <input type='text' class="form-control custom-control" name='typeOfService' value=''/> </p>
                                <p>Short description<textarea name="shortDescription" class="form-control custom-control" cols="25" rows="5"> </textarea></p>
                                <p><input type='submit' class="btn btn-warning btn-md" name='submit' value='submit' /></p>
                            </div>
                    </div>
                    <div class="col-md-9">

                                <?php
                                // Displays the blank calendar

                                $arr = array_fill(0, 84, 0);
                                $Table = new CreateCalendar();
                                $Table->createCalendar($arr);
                                ?>
                    </div>
                </div>
            </form>
        </div>
        <div style="margin-bottom:200px"></div>
<div class='alert alert-info footer'>
	<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
</div>

</body>


</html>