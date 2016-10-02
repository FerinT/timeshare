<?php

include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO1.php";
include_once dirname(__FILE__) . "/php/src/service/ServiceTableGenerator.php";

$Service = new ServiceDAO1;
$ServiceTable = new ServiceTableGenerator;


$ServiceArray = $Service->selectAllServices();
$ServiceTable->generateTable1($ServiceArray);

?>