<?php

if(isset($_POST['submit']))
{

	include_once dirname(__FILE__) . '/../php/src/register/Register.php';
	include_once dirname(__FILE__) . '/../php/src/user/User.php';
	include_once dirname(__FILE__) . '/../php/dataaccess/RegisterDAO.php';

	$UserInfo = $_POST['details'];

	if($_FILES['image']['name'] == "")
	{
		$contents = addslashes(file_get_contents("uploads/default.jpeg"));
	}
	else
	{
		// copies the uploaded image to a temp location
		move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name'] );

		// Gets the contents of the image
		$contents = addslashes(file_get_contents("uploads/". $_FILES['image']['name']));

		// Deletes the image after it is copied to an array
		unlink("uploads/". $_FILES['image']['name']);
	}

	$UserObject = new User();
	$UserObject->setName($UserInfo[0]);
	$UserObject->setEmailAddress($UserInfo[1]);
	$UserObject->setProfilePicture($contents);
	$UserObject->setPassword($UserInfo[3]);
	
	$RegisterDAO = new RegisterDAO;
	
	$Register = new Register();
	$Register->setUser($UserObject);
	$RandomCode = mt_rand(100000,999999); 
	$Register->setVerificationCode($RandomCode);
	
	$RegisterDAO->insertRegister($Register);

//    $UserDAO->insertUser($UserObject);
//    $UserDAO->isValidUser($UserInfo[1],$UserInfo[3]);

    
	header( 'Location: EnterVerificationCode.php' ) ;
}


?>
