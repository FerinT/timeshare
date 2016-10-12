<?php

/*
 * This class serves as a DTO, it holds an array of all items purched for a particular session
 */

class Cart
{

	private $Items = array();
	
	function __construct()
	{
		if(isset($_SESSION['cartItems']))
			$this->Items = $_SESSION['cartItems'];
	}
	
	public function addToCart($NewItem)
	{
		
		$this->Items[] = $NewItem;
		
		$_SESSION['cartItems'] = $this->Items;
	}
	
	// add function to clear entire cart
	// add function to remove an item from cart

}


?>