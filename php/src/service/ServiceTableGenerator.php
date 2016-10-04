<?php

session_start();
include_once dirname(__FILE__) . "/../../dataaccess/ServiceDAO.php";


include_once "Service.php";


class ServiceTableGenerator
{
    public function getTableForUser($UserID)
    {
        $ServiceDAO = new ServiceDAO();
        $ServicesForUser = $ServiceDAO->selectAllServicesForUser($UserID);
        $this->generateTable1($ServicesForUser);
    }

    function generateTable($ServiceArray)
    {
        echo "<table style = \"width:80%\" >
              <tr >
                <th > Firstname</th >
                <th > Lastname</th > 
                <th > Age</th >
              </tr >";

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
                <td > UserImage</td >
                <td > 
                        <p>${ServiceOffered}</p>        
                        <p>${ServiceDescription}</p>          
                </td > 
                <td > 50</td >
              </tr >";

        }
           echo "</table >";


    }
	
	// Ferin's mess 
	function generateTable1($ServiceArray)
    {
        echo "<table style = \"width:80%\" >
              <tr >
                <th >Profile Picture</th >
                <th >Description</th > 
                <th >Price Per Hour</th >
				<th >View Schedule</th >
              </tr >";

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
              <tr >
                <td align='center'>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'" style="width:128px;height:128px;"/>';
				echo"</td >
                <td align='center'> 
                        <p>${ServiceOffered}</p>        
                        <p>${ServiceDescription}</p>          
                </td > 
                <td align='center'> <p>${RatePerHour}</p></td >
				<td align='center'> <p><a href='AdvertDetails.php?index=${ArrayIndex}'>click</a></p></td>
              </tr >";
			$ArrayIndex += 1;
        }
           echo "</table >";

		$_SESSION['ServiceArray'] = $ServiceArray;
    }

}