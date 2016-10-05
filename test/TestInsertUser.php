<?php

if(isset($_POST['submit']))
{
	
	include_once dirname(__FILE__) . '/../php/src/user/User.php';
	include_once dirname(__FILE__) . '/../php/dataaccess/UserDAO.php';

	$UserInfo = $_POST['details'];
	
	// copies the uploaded image to a temp location
 	move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name'] );
	
	// Gets the contents of the image 
	$contents = addslashes(file_get_contents("uploads/". $_FILES['image']['name']));
	
	// Deletes the image after it is copied to an array
	unlink("uploads/". $_FILES['image']['name']);
	
	$UserObject = new User();
	$UserObject->setName($UserInfo[0]);
	$UserObject->setEmailAddress($UserInfo[1]);	
	$UserObject->setProfilePicture($contents);
	$UserObject->setPassword($UserInfo[3]);
	$UserDAO = new UserDAO;
				
	$UserDAO->insertUser($UserObject);

	/*
	// This returns the image of the user you inserted to ensure its working correctly
	$UserObject->setUserId(19);
	$UserOject = $UserDAO->readUser($UserObject);
	$image = $UserObject->getProfilePicture(); 
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>'; */
	
}


?>


<html>

<body>

<form name="myForm" action="TestInsertUser.php" method="POST" enctype="multipart/form-data">
    <p>Name: <input type='text' name='details[0]' value=""/> </p>
	<p>Email Address: <input type='text' name='details[1]' value=""/> </p>
	<p>Profile picture: <input type='file' name='image' accept="image/jpeg" value="" /> </p>
	<p>Password: <input type='password' name='details[2]' value=""/> </p>
	<p>Confirm Password: <input type='password' name='details[3]' value=""/> </p>
    <p><input type='submit' name='submit' value='submit'/>
</form>

</body>
<html>