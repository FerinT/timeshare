<?php

session_start();
include_once dirname(__FILE__) . "/../../dataaccess/ServiceDAO.php";

include_once "Service.php";
include dirname(__FILE__) . '/../../../pages/header.php';

class ServiceTableGenerator
{
    public function getTableForUser($UserID)
    {
        $ServiceDAO = new ServiceDAO();
        $ServicesForUser = $ServiceDAO->selectAllServicesForUser($UserID);
        $this->generateTable($ServicesForUser);
    }

    public function renderPage($Service1, $ArrayIndex)
    {
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
        echo '<img class="img-rounded" src="data:image/jpeg;base64,' . base64_encode($image) . '" style="width:236px;height:128px;"/>';
        echo "</td >
                <td class='row-text-center' align='center'> 
                        <h3 class='row-text-center'><b>${ServiceOffered}</b></h3>        
                        <p class='row-text-center'><b>${ServiceDescription}</b></p>          
                </td > 
                <td class='row-text-center' align='center'> <h3 class='row-text-center'><b>R${RatePerHour}</b></h3></td >
				<td class='row-text-center' align='center'> <p class='row-text-center'><a class='btn btn-info custom-button' role='button' type=''button href='AdvertDetails.php?index=${ArrayIndex}'><b>View Schedule</b></a></p></td>
              </tr >";
    }

    function generateTable1($ServiceArray)
    {
        echo '<div class="container spaces-top">

              <form method="post" action="#">
                <div align="center"> <input type="text" name="search" class="form-control spaces-bottom search-field" placeholder="Let\'s Find Me A Tutor! - Example Maths, Musician, Science etc"/>
                    <button type="submit" name="submit" class="btn btn-md btn-warning  search-button spaces-left glyphicon glyphicon-search"></button> 
                </div>
              </form>
              
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
        $isServiceFound = false;

        $countServices = 0;

        foreach ($ServiceArray as $Service1) {

            $serviceDescription = strtolower($Service1->getServiceOffered());

            $search = '';

            if (isset($_POST['search'])) {
                $search = $_POST['search'];
            }

            if (empty($search)) {
                $this->renderPage($Service1, $ArrayIndex);
                $isServiceFound = true;
                $ArrayIndex += 1;
            } else {
                $search = strtolower($_POST['search']);
			
				if (strpos($serviceDescription, $search) !== false) {
					$this->renderPage($Service1, $ArrayIndex);
					$isServiceFound = true;
					$ArrayIndex += 1;
				}
			}
        }

        if (!$isServiceFound) {

            $ArrayIndex = 0;

            foreach ($ServiceArray as $Service1) {
                $this->renderPage($Service1, $ArrayIndex);
                $ArrayIndex += 1;
            }

            echo ' <input type="hidden" id="notFound" name="button" data-toggle="modal" data-target="#myModal" />


                  <div id="myModal" style="margin-top:300px" class="modal fade" role="dialog">
                    <div class="modal-dialog middle-buttons panel custom-panel">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <h4 class="modal-title page-header"><b>Tutor Search</b></h4>
                            </div>
                            <div align="center" class="modal-body">
                                <p>Oops! Seems That There Are No Tutors Offering That Service</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>';

            echo '<script src="../js/jquery.min.js"></script>';

            echo '<script>
$(document).ready(function(){
  $(\'#notFound\').trigger(\'click\');
                });
                  </script>';
        }


        echo "</table ></div></div>";

        $_SESSION['ServiceArray'] = $ServiceArray;
       unset($_POST['search']);
    }

}

