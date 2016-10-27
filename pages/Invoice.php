<?php
/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 10/26/2016
 * Time: 4:12 PM
 */
include dirname(__FILE__) . "/header.php";


include_once dirname(__FILE__) . "/../php/src/cart/Item.php";
include_once dirname(__FILE__) . "/../php/src/cart/Cart.php";
include_once dirname(__FILE__) . "/../php/src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/../php/src/user/User.php";
include_once dirname(__FILE__) . "/../php/src/service/Service.php";
include_once dirname(__FILE__) . "/../php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/../php/dataaccess/ScheduleDAO.php";
include_once dirname(__FILE__) . "/../php/dataaccess/TransactionDAO.php";
include_once dirname(__FILE__) . "/../php/src/transaction/Transaction.php";

if (session_id() == '') {
    session_start();
}
$cart = new Cart();
$body = $_SESSION['invoiceDetails'];
$cart = $_SESSION['cartItems'];


$invoiceArray = explode(":", $body);


echo '<html>
<head></head>
<body>';

$date = date("Y-m-d H:i:s");
echo "";
echo "
<div class='table-responsive container-fluid altered-invoice-container spaces-top' >
                    <div align='right'><h1 class='page-header'>Invoice</h1></div>
                    <div align='right'><b>Date: " . $date . "</b></div>
                    <div align='right'><b>Order#: " . $_SESSION['orderID'] . "</b></div>
					<table class=\"table table-bordered table-header-invoice-color\" >
					<tr style='background:#b7b3b3'>
						<th >Seller Name</th >
						<th >Description</th > 
						<th >Rate (Per Hour)</th >
						<th >Date</th >
					  </tr >
					
";

for ($i = 0; $i < count($invoiceArray) - 1; $i++) {
    if ($i % 4 == 0) {
        echo '<tr>
						<td >' . $invoiceArray[$i] . '</td >
						<td >' . $invoiceArray[$i + 1] . '</td > 
						<td >' . $invoiceArray[$i + 2] . '</td >
						<td >' . $invoiceArray[$i + 3] . '</td >
					  </tr >';
    }

}

echo "</table>";

echo '<div class="row cart-total-invoice table-header-invoice-color spaces-bottom">
                    
                    <div class="col-md-2"> </div>
                    <div class="col-md-2"> </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>  
                     <div class="col-md-2"> 
                    </div>    
                    <div class="col-md-2">
                        <h4><b>Total cost: R' . $_SESSION['totalCartCost'] . '</b></h4></div>
                         
                             
          </div>
          </div>
    ';


echo '<div style="margin-top: 693px"></div>';


echo "			<div class='alert alert-info footer'>
						<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
					</div>
					</body>
				</html>";
?>