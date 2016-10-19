<?php

/**
 *
 *
 *
 */

if(session_id() == '') {
   session_start();
}


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

			$this->Connection->query($sql);

            $id = $this->Connection->insert_id;
            return $id;
		}

		// by passing UserObject as a parameter it avoids us having to include the User class which cause a cyclic dependency
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
				$_SESSION['username'] = $Row['name'];
				$_SESSION['userID'] = $Row['userid'];
                $_SESSION['email'] =$Row['emailaddress'];

				return true;
			}
			else
			{
				$_SESSION['username'] = null;

				return false;
			}
		}
}