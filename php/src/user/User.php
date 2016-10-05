<?php

class User
{

    private $UserId;
    private $EmailAddress;
    private $Name;
    private $Password;
    private $ProfilePicture;


	public function __construct(){
	}
	
    public function setAll($UserId, $EmailAddress, $Name, $Password, $ProfilePicture)
    {
        $this->UserId = $UserId;
        $this->EmailAddress = $EmailAddress;
        $this->Name = $Name;
        $this->Password = $Password;
        $this->ProfilePicture = $ProfilePicture;
    }


    public function getUserId()
    {
        return $this->UserId;
    }

    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
    }

    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    public function setEmailAddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getProfilePicture()
    {
        return $this->ProfilePicture;
    }


    public function setProfilePicture($ProfilePicture)
    {
        $this->ProfilePicture = $ProfilePicture;
    }



}