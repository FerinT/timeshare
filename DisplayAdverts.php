<?php

include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/php/src/service/ServiceTableGenerator.php";

$Service = new ServiceDAO;
$ServiceTable = new ServiceTableGenerator;


$ServiceArray = $Service->selectAllServices();
$ServiceTable->generateTable1($ServiceArray);

?>