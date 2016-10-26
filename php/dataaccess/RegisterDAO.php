<?php

include_once dirname(__FILE__) . "/../src/user/User.php";
include_once dirname(__FILE__) . "/UserDAO.php";

if (session_id() == '') {
    session_start();
}


class RegisterDAO
{
    private $Connection;

    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "TIMESHARE");
    }

    public function insertRegister($RegisterObject)
    {
        $UserObject = $RegisterObject->getUser();
        $contents = $UserObject->getProfilePicture();
        $email = $UserObject->getEmailAddress();
        $name = $UserObject->getName();
        $password = $UserObject->getPassword();
        $verificationCode = $RegisterObject->getVerificationCode();


        $sql = "INSERT INTO Registration (emailaddress, name, password, code, profilepicture) VALUES ('$email','$name','$password', '$verificationCode', '$contents')";

        $this->Connection->query($sql);

        $id = $this->Connection->insert_id;
        return $id;
    }

    public function isVerifiedUser($Email)
    {
        $Sql = "SELECT * FROM Registration WHERE emailaddress = '$Email'";
        $Result = $this->Connection->query($Sql);
        $Row = $Result->fetch_assoc();

        if (count($Row) > 0)
            return false;
        else
            return true;
    }

    public function isRegisterUser($Code, $Email)
    {
        $Sql = "SELECT * FROM `Registration` WHERE emailaddress = '${Email}' AND (code) = '${Code}';";
        $Result = $this->Connection->query($Sql);
        $Row = $Result->fetch_assoc();


        if (count($Row) > 0) {
            $UserObject = new User;

            $UserObject->setEmailAddress($Row['emailaddress']);
            $UserObject->setName($Row['name']);
            $UserObject->setPassword($Row['password']);
            $UserObject->setProfilePicture($Row['profilepicture']);
            $id = $Row['id'];

            // insert into user table
            //mysqli_close($this->Connection);
            $Userdao = new UserDAO;
            $Userdao->insertUser($UserObject);


          /*  if (!mysqli_query($this->Connection,"INSERT INTO USER (emailaddress, name, password) VALUES ('$email','$name','$password')"))
            {
                echo("Error description: " . mysqli_error($this->Connection));
            }*/



            //$Result = $this->Connection->query($sql);
            // delete record
            $SqlDelete = "DELETE FROM Registration WHERE id = $id";
            $Result = $this->Connection->query($SqlDelete);


            return true;
        } else {
            // invalid email/code combination

            return false;
        }
    }
}