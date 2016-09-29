<?php

/**
 * 
 * 
 * 
 */

//include 'php/src/user/User.php';

class UserDAO
{
		private $Connection;
		
		function __construct(){
			$this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
		}
	
		public function insertUser($UserObject)
		{
			
			$contents = addslashes(file_get_contents("php/dataaccess/a.jpg"));
			
			$email = $UserObject->getEmailAddress();
			$name = $UserObject->getName();
			$password = $UserObject->getPassword();
			
			
			$sql = "INSERT INTO user (userid, emailaddress, name, password, profilepicture) VALUES (NULL, '$email','$name','$password', '$contents')";
			
			$result = $this->Connection->query($sql);			

		} 
		
		public function readUser($pk)
		{
			$Sql = "SELECT * FROM user WHERE userid = $pk";
			$Result = $this->Connection->query($Sql);
			$Row = $Result->fetch_assoc();
			
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $Row['profilepicture'] ).'"/>';
		}
}