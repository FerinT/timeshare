<?php


include_once dirname(__FILE__) . "/php/src/cart/Item.php";
include_once dirname(__FILE__) . "/php/src/cart/Cart.php";

// Create object of Item.php
// Add item to Cart.php
// Add the cart to a session variable

$indexes = $_SESSION['indexes']; // array of idexes passed from AdvertDetails.php
$advert = $_SESSION['advertObject']; // advert to which these Schedule indexes belong (Line above)


$Days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");


$Cart = new Cart();

foreach($indexes as $index)
{
	$Item = new Item();
	
	// get the time
	$timeIndex = floor($index / 7); // round down to the nearest whole number
	$time = 8 + $timeIndex; // 8 becuase that is our start time
	
	// get the day
	$dayIndex = floor($index - ($timeIndex * 7));
	$dayString = $Days[$dayIndex];
	
	$Item->setTime($time . "h00 - ". ($time + 1) . "h00");
	$Item->setDay($dayString);
	$Item->setAdvert($advert);
	$Item->setIndex($index);
	
	$Cart->addToCart($Item);
	
} 


?>