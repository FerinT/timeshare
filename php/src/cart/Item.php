<?php

/*
 * This class serves as a DTO, it store an instace of an item purchased
 *
 */

class Item
{
	private $Day;
	private $Time;
	private $Index;
	private $Advert; // value object (An advert is a service)

	function __construct()
	{
	}
	
	// Setters
	public function setDay($Day)
	{
		$this->Day = $Day;
	}
	
	public function setTime($Time)
	{
		$this->Time = $Time;
	}
	
	public function setAdvert($Advert)
	{
		$this->Advert = $Advert;
	}
	
	public function setIndex($Index)
	{
		$this->Index = $Index;
	}
	
	// getters
	public function getDay()
	{
		return $this->Day;
	}
	
	public function getTime()
	{
		return $this->Time;
	}
	
	public function getAdvert()
	{
		return $this->Advert;
	}
	
	public function getIndex()
	{
		return $this->Index;
	}

}


?>