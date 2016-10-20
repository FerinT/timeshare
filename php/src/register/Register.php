<?php

class Register{
	private $User;
	private $VerificationCode;
	
	function __construct(){
		
	}
	
	public function setUser($UserObject){
		$this->User = $UserObject;
	}
	
	public function setVerificationCode($code){
		$this->VerificationCode = $code;
	}

	public function getUser(){
		return $this->User;
	}
	
	public function getVerificationCode(){
		return $this->VerificationCode;
	}
}

?>