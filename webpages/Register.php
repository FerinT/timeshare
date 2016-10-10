<?php

if(isset($_POST['submit']))
{
	
	include_once dirname(__FILE__) . '/../php/src/user/User.php';
	include_once dirname(__FILE__) . '/../php/dataaccess/UserDAO.php';

	$UserInfo = $_POST['details'];
	// validation for empty filed
	if($UserInfo[0] == "" || $UserInfo[1] == "" || $UserInfo[2] == "" || $UserInfo[3] == "")
	{	
		echo '<script type="text/javascript">alert("Please ensure that you fill in all fiields");</script>';
	}
	
	// validation for password
	else if($UserInfo[2] != $UserInfo[3])
	{
		echo '<script type="text/javascript">alert("Please ensure that your passwords match");</script>';
		
	}

	else
	{
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
		$UserDAO = new UserDAO;
					
		$UserDAO->insertUser($UserObject); 
	}
	
}


?>


<html>

<body>

<form name="myForm" action="Register.php" method="POST" enctype="multipart/form-data">
    <p>Name: <input type='text' name='details[0]' value="<?php if(isset($_POST['submit'])){ $details = $_POST['details']; echo $details[0]; }?>"/> </p>
	<p>Email Address: <input type='text' name='details[1]' value="<?php if(isset($_POST['submit'])){ $details = $_POST['details']; echo $details[1]; }?>"/> </p>
	<p>Profile picture: <input type='file' name='image' accept="image/jpeg" value="" /> </p>
	<p>Password: <input type='password' name='details[2]' value=""/> </p>
	<p>Confirm Password: <input type='password' name='details[3]' value=""/> </p>
    <p><input type='submit' name='submit' value='submit'/>
</form>

</body>
<html>