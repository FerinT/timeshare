<?php

include dirname(__FILE__) .'/../../../pages/header.php';

include dirname(__FILE__) . "/../../../php/src/cart/Item.php";
include dirname(__FILE__) . "/../../../php/src/user/User.php";
include dirname(__FILE__) . "/../../../php/src/service/Service.php";
	session_start();
if(!isset($_SESSION['cartItems']))
	echo"your cart is empty";
else
{


	$cart = $_SESSION['cartItems'];


	   echo '<div class="container spaces-top">
					<div class="table-responsive"> 
						<table class="table table-bordered table-header-color">
						  <tr>
							<th class="custom-row-header row-font-size">Seller</th >
							<th class="custom-row-header row-font-size">Description</th > 
							<th class="custom-row-header row-font-size">Price Per Hour</th >
							<th class="custom-row-header row-font-size">Time and Day</th >
							<th class="custom-row-header row-font-size">remove</th >
						  </tr >
				';

			foreach ($cart as $c) {

				//  principle of least knowledge for who LOL
				$SellerName = $c->getAdvert()->getUser()->getName();
				$SellerImage = $c->getAdvert()->getUser()->getProfilePicture(); 
				$Description = $c->getAdvert()->getServiceDescription();
				$Price = $c->getAdvert()->getRatePerHour();
				$TimeAndDay = $c->getDay() . $c->getTime();

				   echo "
				  <tr class='active'>
					<td class='row-text-center' align='center'>   
					<p class='row-text-center'><b>${SellerName}</b></p>";
					echo '<img class="img-rounded" src="data:image/jpeg;base64,'.base64_encode( $SellerImage ).'" style="width:236px;height:128px;"/>';
					echo"</td >
					<td class='row-text-center' align='center'> 
							<h3 class='row-text-center'><b>${Description}</b></h3>        
					</td > 
					<td class='row-text-center' align='center'> <h3 class='row-text-center'><b>R${Price}</b></h3></td >
					<td class='row-text-center' align='center'> <h3 class='row-text-center'><b>${TimeAndDay}</b></h3></td >
					<td class='row-text-center' align='center'> <p class='row-text-center'><a class='btn btn-info custom-button' role='button' type=''button ><b>Remove</b></a></p></td>
				  </tr >";
			}



		 echo "</table ></div></div>
					<div class='alert alert-info footer'>
						<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
					</div></body>
				</html>";
}
?>