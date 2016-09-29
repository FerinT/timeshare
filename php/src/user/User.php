<?php

/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 9/29/2016
 * Time: 2:55 PM
 */
class User
{

    /**
     * @var
     */
    private $UserId;
    /**
     * @var
     */
    private $EmailAddress;
    /**
     * @var
     */
    private $Name;
    /**
     * @var
     */
    private $Password;
    /**
     * @var
     */
    private $ProfilePicture;

    /**
     * User constructor.
     * @param $UserId
     * @param $EmailAddress
     * @param $Name
     * @param $Password
     * @param $ProfilePicture
     */
    public function __construct($UserId, $EmailAddress, $Name, $Password, $ProfilePicture)
    {
        $this->UserId = $UserId;
        $this->EmailAddress = $EmailAddress;
        $this->Name = $Name;
        $this->Password = $Password;
        $this->ProfilePicture = $ProfilePicture;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param mixed $UserId
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    /**
     * @param mixed $EmailAddress
     */
    public function setEmailAddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getProfilePicture()
    {
        return $this->ProfilePicture;
    }

    /**
     * @param mixed $ProfilePicture
     */
    public function setProfilePicture($ProfilePicture)
    {
        $this->ProfilePicture = $ProfilePicture;
    }



}