<?php

/**
 * 
 * 
 * 
 */

class UserDAO
{
	    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }
	
		public function insertUser($UserObject)
		{
			// this needs to change to the $UserObject->getProfilePicture();
			// $contents = addslashes(file_get_contents("php/dataaccess/a.jpg"));
			$contents = $UserObject->getProfilePicture();
			$email = $UserObject->getEmailAddress();
			$name = $UserObject->getName();
			$password = $UserObject->getPassword();
			
			
			$sql = "INSERT INTO user (userid, emailaddress, name, password, profilepicture) VALUES (NULL, '$email','$name','$password', '$contents')";
			
			$result = $this->Connection->query($sql);			

		} 
		
		// by pass UserObject as a parameter it avoids us having to include the User class which cause a cycilic dependancy
		public function readUser($UserObject)
		{
			$id = $UserObject->getUserId();
		
			$Sql = "SELECT * FROM user WHERE userid = $id";
			$Result = $this->Connection->query($Sql);
			$Row = $Result->fetch_assoc();
			
			$UserObject->setEmailAddress($Row['emailaddress']);
			$UserObject->setName($Row['name']);
			$UserObject->setPassword($Row['password']);
			$UserObject->setProfilePicture($Row['profilepicture']);
			$UserObject->setUserId($Row['userid']);
			
			return $UserObject;
		}
	
		public function isValidUser($email, $password)
		{
			$Sql = "SELECT * FROM `user` WHERE emailaddress = '${email}' AND (password) = '${password}';";
		    $Result = $this->Connection->query($Sql);
        	$Row = $Result->fetch_assoc();
			
			if(count($Row) >= 0)
			{
				session_start();
				$_SESSION['username'] = $Row['name'];
				return true;
			}
			else
			{
				$_SESSION['username'] = null;
				return false;
			}
		}
}