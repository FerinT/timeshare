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


if (session_id() == '') {
    session_start();
}

$cart = $_SESSION['cartItems'];
$ServiceDAOobject = new ServiceDAO();
$ScheduleDAOobject = new ScheduleDAO();
$TransactionDAOobject = new TransactionDAO();

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
    
}

// Insert into order line table
$Transaction = new Transaction($_SESSION['userID'], date("Y-m-d H:i:s"));
$TransactionDAOobject->saveTransaction($Transaction, $cart);
session_unset($_SESSION['cartItems']);

?>