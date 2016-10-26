<?php

include_once dirname(__FILE__) . "/php/src/cart/Item.php";
include_once dirname(__FILE__) . "/php/src/cart/Cart.php";
include_once dirname(__FILE__) . "/php/src/schedule/Schedule.php";
include_once dirname(__FILE__) . "/php/src/user/User.php";
include_once dirname(__FILE__) . "/php/src/service/Service.php";
include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO.php";
include_once dirname(__FILE__) . "/php/dataaccess/ScheduleDAO.php";
include_once dirname(__FILE__) . "/php/dataaccess/TransactionDAO.php";
include_once dirname(__FILE__) . "/php/src/transaction/Transaction.php";

//require_once('MailSetup.php');


if (session_id() == '') {
    session_start();
}

if ($_SESSION['email'] == "" or !isset($_SESSION['email'])) {
    echo "<script type=\"text/javascript\">window.alert('You must be a registered user.');window.location.href = 'pages/DisplayCart.php';</script>";
    exit;
}


$cart = $_SESSION['cartItems'];
$ServiceDAOobject = new ServiceDAO();
$ScheduleDAOobject = new ScheduleDAO();
$TransactionDAOobject = new TransactionDAO();
//$setup = new MailSetup();
$Invoiceoutput = "";
$HTMLInvoiceOutput = "";
$a = array();
foreach ($cart as $item) {
    $ServiceID = $item->getAdvert()->getServiceId();

    // Returns the service
    $ServiceObject = $ServiceDAOobject->selectServiceById($ServiceID);

    // Get the schedule object associated with the service
    $ScheduleObject = $ServiceObject->getSchedule();

    // Updates schedule inventory
    $ScheduleArray = explode(',', $ScheduleObject->getScheduleArray());
    $ScheduleArray[$item->getIndex()] = '0';
    $ScheduleObject->setScheduleArray(implode(',', $ScheduleArray));
    $ScheduleDAOobject->updateSchedule($ScheduleObject);

    //Transaction Email information

    $SellerID = $item->getAdvert()->getUser()->getUserId();
    $SellerName = $item->getAdvert()->getUser()->getName();
    $SellerEmail = $item->getAdvert()->getUser()->getEmailAddress();
    $datetime = $item->getDay() . $item->getTime();
    $description = $item->getAdvert()->getServiceDescription();

    if (array_key_exists($SellerEmail, $a)) {
        $a[$SellerEmail] .= $description . " on " . $datetime . " }";

    } else {
        $a[$SellerEmail] = $description . " on " . $datetime . " }";

    }

    //Setup Invoice Information
    $Invoiceoutput .= "Seller Name: " . $item->getAdvert()->getUser()->getName() . " Advert: " . $item->getAdvert()->getServiceDescription() . " Rate: " . $item->getAdvert()->getRatePerHour() . " Date: " . $datetime . "\n";
    $HTMLInvoiceOutput .= "Seller Name: " . $item->getAdvert()->getUser()->getName() . " Advert: " . $item->getAdvert()->getServiceDescription() . " Rate: " . $item->getAdvert()->getRatePerHour() . " Date: " . $datetime . "<br/>";
}

//Send Transaction Emails to Sellers
foreach ($a as $key => $value) {

    $EmailSubject = "Advert Inquiry";
    $EmailIntro = "I am interested the following services: \n";
    $ListOfServices = explode(" }", $value);
    $EmailBody = $EmailIntro;

    foreach ($ListOfServices as $service) {
        $EmailBody .= $service . "\n";
    }

    $EmailFooter = "\n\n Please contact me via email " . $_SESSION['email'];

    $EmailBody .= $EmailFooter;
    //$setup->mail($_SESSION['username'], $EmailSubject, $key, $EmailBody);

}
$Invoiceoutput .= "\n\nTotal Cost = " . $_SESSION['totalCartCost'];
$HTMLInvoiceOutput .= "<br/><br/>Total Cost = " . $_SESSION['totalCartCost'];
//Send Invoice to logged in user
$body = "INVOICE \n" . $Invoiceoutput;
$HTMLBody = "INVOICE <br/>" . $Invoiceoutput;
$_SESSION['invoiceDetails'] = $HTMLBody;

//$setup->mail("TimeShare", "Invoice", $_SESSION['email'], $body);


// Insert into order line table
$Transaction = new Transaction($_SESSION['userID'], date("Y-m-d H:i:s"));
$TransactionDAOobject->saveTransaction($Transaction, $cart);
$_SESSION['cartItems'] = "";
header('Location: pages/Invoice.php');
?>