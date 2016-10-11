<?php

/*
 * This class serves as a DTO, it holds an array of all items purched for a particular session
 */
class Cart
{
	private $Items = array(); // array of items (Item.php)
	
	function __construct()
	{
	}
	
	public function addToCart($NewItem)
	{
		$Items = array_merge($Items, $NewItem)
	}
	
	// add function to clear entire cart
	// add function to remove an item from cart

}


?>