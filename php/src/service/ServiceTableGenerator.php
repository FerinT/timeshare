<?php

session_start();
include_once dirname(__FILE__) . "/../../dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/../../dataaccess/ServiceDAO1.php";

include_once "Service.php";
include dirname(__FILE__) .'/../../../pages/header.php';

class ServiceTableGenerator
{
    public function getTableForUser($UserID)
    {
        $ServiceDAO = new ServiceDAO();
        $ServicesForUser = $ServiceDAO->selectAllServicesForUser($UserID);
        $this->generateTable($ServicesForUser);
    }

    function generateTable($ServiceArray)
    {
		echo '<table style = \"width:80%\" >
				<tr >
					<th > Firstname</th >
					<th > Lastname</th > 
					<th > Age</th >
              </tr >";
			 ';

        foreach ($ServiceArray as $Service) {
            $ServiceId = $Service->getServiceId();
            $ScheduleId = $Service->getScheduleID();
            $UserId = $Service->getUserId();
            $Category = $Service->getCategory();
            $RatePerHour = $Service->getRatePerHour();
            $Location = $Service->getLocation();
            $SubCategories = $Service->getSubCategories();
            $ServiceDescription = $Service->getServiceDescription();
            $ServiceOffered = $Service->getServiceOffered();

            echo "
              <tr >
                <td> UserImage</td >
                <td > 
                        <p class='row-text-center'><b>${ServiceOffered}</b></p>        
                        <p class='row-text-center'><b>${ServiceDescription}</b></p>          
                </td > 
                <td > 50</td >
              </tr >";

        }
           echo "</table >";


    }
	
	// Ferin's mess 
	function generateTable1($ServiceArray)
    {
        echo '<div class="container spaces-top">
				<div class="table-responsive"> 
					<table class="table table-bordered table-header-color">
					  <tr>
						<th class="custom-row-header row-font-size">Profile Picture</th >
						<th class="custom-row-header row-font-size">Description</th > 
						<th class="custom-row-header row-font-size">Price Per Hour</th >
						<th class="custom-row-header row-font-size">Schedule</th >
					  </tr >
			';

	    $ArrayIndex = 0;
		
        foreach ($ServiceArray as $Service1) {
            $ServiceId = $Service1->getServiceId();
            $UserObject = $Service1->getUser();
			$image = $UserObject->getProfilePicture(); 
            $ScheduleObject = $Service1->getSchedule();
            $Category = $Service1->getCategory();
            $RatePerHour = $Service1->getRatePerHour();
            $Location = $Service1->getLocation();
            $SubCategories = $Service1->getSubCategories();
            $ServiceDescription = $Service1->getServiceDescription();
            $ServiceOffered = $Service1->getServiceOffered();
            echo "
              <tr class='active'>
                <td class='row-text-center' align='center'>";
				echo '<img class="img-rounded" src="data:image/jpeg;base64,'.base64_encode( $image ).'" style="width:236px;height:128px;"/>';
				echo"</td >
                <td class='row-text-center' align='center'> 
                        <h3 class='row-text-center'><b>${ServiceOffered}</b></h3>        
                        <p class='row-text-center'><b>${ServiceDescription}</b></p>          
                </td > 
                <td class='row-text-center' align='center'> <h3 class='row-text-center'><b>R${RatePerHour}</b></h3></td >
				<td class='row-text-center' align='center'> <p class='row-text-center'><a class='btn btn-info custom-button' role='button' type=''button href='AdvertDetails.php?index=${ArrayIndex}'><b>View Schedule</b></a></p></td>
              </tr >";
			$ArrayIndex += 1;
        }
           echo "</table ></div></div>
				<div class='alert alert-info footer'>
					<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
				</div></body>
			</html>";

		$_SESSION['ServiceArray'] = $ServiceArray;
    }

}