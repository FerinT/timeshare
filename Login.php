<?php

include dirname(__FILE__) . "/php/dataaccess/UserDAO.php";

$details = $_POST['details'];

$User = new UserDAO();

$isValid = $User->isValidUser($details[0], $details[1]);

if($isValid)
{
	header( 'Location: DisplayAdverts.php' ) ;
}
else
{
	echo"fail";
}


?>