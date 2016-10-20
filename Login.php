<?php

include dirname(__FILE__) . "/php/dataaccess/UserDAO.php";
include dirname(__FILE__) . "/php/dataaccess/RegisterDAO.php";

$details = $_POST['details'];

$User = new UserDAO();
$Register = new RegisterDAO();

$isValid = $User->isValidUser($details[0], $details[1]); // details[0] = email, details[1] = password 
$isVerifiedUser = $Register->isVerifiedUser($details[0]);


if ($isValid === true && $isVerifiedUser === true) {
    header('Location: DisplayAdverts.php');
}  if ($isVerifiedUser == false){
    echo "Please verify your account";
	 header('Location: webpages/EnterVerificationCode.php');
}
else{
	echo "Invalid username and password combination";
}


?>l