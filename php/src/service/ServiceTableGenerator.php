<?php

/**
 * Created by PhpStorm.
 * User: Brandonhome
 * Date: 2016/09/30
 * Time: 10:06 AM
 */
include_once dirname(__FILE__) . "/../../dataaccess/ServiceDAO.php";
include_once "Service.php";

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

}