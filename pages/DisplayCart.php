<?php

include dirname(__FILE__) . "/../php/src/cart/Item.php";
include dirname(__FILE__) . "/../php/src/cart/Cart.php";
include dirname(__FILE__) . "/../php/src/user/User.php";
include dirname(__FILE__) . "/../php/src/service/Service.php";
include dirname(__FILE__) . "/header.php";


if (session_id() == '') {
    session_start();
}

if (isset($_GET['index'])) {
    $Cart = new Cart();
    $Cart->removeItem();
    header('Location: DisplayCart.php');
}


if (!isset($_SESSION['cartItems']) || $_SESSION['cartItems'] == ""){

}
else {
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

    $cntItems = 0;
    $totalCartCost = 0.0;
    foreach ($cart as $c) {
        //  principle of least knowledge for who LOL
        $SellerName = $c->getAdvert()->getUser()->getName();
        $SellerImage = $c->getAdvert()->getUser()->getProfilePicture();
        $Description = $c->getAdvert()->getServiceDescription();
        $Price = $c->getAdvert()->getRatePerHour();
        $TimeAndDay = $c->getDay() . " " . $c->getTime();
        $SellerEmail = $c->getAdvert()->getUser()->getEmailAddress();


        echo "
				  <tr class='active'>
					<td class='row-text-center' align='center'>   
					<p class='row-text-center'><b>${SellerName}</b></p>";
        echo '<img class="img-rounded" src="data:image/jpeg;base64,' . base64_encode($SellerImage) . '" style="width:236px;height:128px;"/>';
        echo "</td >
					<td class='row-text-center' align='center'> 
							<h3 class='row-text-center'><b>${Description}</b></h3>        
					</td > 
					<td class='row-text-center' align='center'> <h3 class='row-text-center'><b>R${Price}</b></h3></td >
					<td class='row-text-center' align='center'> <h3 class='row-text-center'><b>${TimeAndDay}</b></h3></td >
					<td class='row-text-center' align='center'><input type='button' name='removeItembtn' value='Remove Item' onclick=\"window.location.href='DisplayCart.php?index=${cntItems}'\"/> </td>
				  
				  ";
        $cntItems++;
        $totalCartCost = $totalCartCost + $Price;
    }


    $_SESSION['totalCartCost'] = $totalCartCost;

/*
    echo "<tr><td></td><td></td>
           <td></td>
            <td class='row-text-center' align='center'><h3 class='row-text-center'><b>Total cost: R${totalCartCost}</b></h3> 
           </td>
        <td>
          <input type='button' type='button' value='checkout' onclick=\"window.location.href='../UpdateSchedule.php'\"/>
          </td>
				  </tr >";


    echo "<tr>  <td></td> <td></td> <td></td> <td></td> <td>  </td></tr>";*/

    echo "</table>";


    echo '<div class="row cart-total table-header-color spaces-bottom">
                    
                    <div class="col-md-2"> </div>
                    <div class="col-md-2"> </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                  
                    <div class="col-md-2"><h4><b>Total cost: R'.$_SESSION['totalCartCost'].'</b></h4></div>
                    <div class="col-md-2"> 
                    <div align="center"><input type=\'button\'  class="btn btn-md  btn-success spaces-left" value=\'checkout\' onclick="window.location.href=\'../UpdateSchedule.php\'"/></div>
                    </div>         
                             
          </div></div></div><div style="margin-top:100px"></div>
    ';
	
	
	include dirname(__FILE__) . "/footer.php";
    
}


?>
