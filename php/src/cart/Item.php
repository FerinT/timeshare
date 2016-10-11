<?php

/*
 * This class serves as a DTO, it store an instace of an item purchased
 *
 */
class Item
{
	private $Day;
	private $Time;
	private $Price;
	private $Advert; // value object

	function __construct()
	{
	}
	
	public function setDay($Day)
	{
		$this->Day = $Day;
	}
	
	public function setTime($Time)
	{
		$this->Time = $Time;
	}
	
	public function setPrice($Price)
	{
		$this->Price = $Price;
	}
	
	public function setAdvert($Advert)
	{
		$this->Advert = $Advert;
	}
	

}


?>