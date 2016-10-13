<?php

	include_once dirname(__FILE__) . "/php/src/cart/Item.php";
	include_once dirname(__FILE__) . "/php/src/cart/Cart.php";
	include_once dirname(__FILE__) . "/php/src/schedule/Schedule.php";
	include_once dirname(__FILE__) . "/php/src/user/User.php";
	include_once dirname(__FILE__) . "/php/src/service/Service.php";
	include_once dirname(__FILE__) . "/php/dataaccess/ServiceDAO.php";
	include_once dirname(__FILE__) . "/php/dataaccess/ScheduleDAO.php";

	if(session_id() == '') {
		session_start();
	}

	$cart = $_SESSION['cartItems'];

	$ServiceDAOobject = new ServiceDAO();
	$ScheduleDAOobject = new ScheduleDAO();

	foreach($cart as $item)
	{
		$ServiceID = $item->getAdvert()->getServiceId();

		// returns the service
		$ServiceObject = $ServiceDAOobject->selectServiceById($ServiceID);

		// get the schedule object associated with the service
		$ScheduleObject = $ServiceObject->getSchedule();

		$ScheduleArray = explode(',',$ScheduleObject->getScheduleArray());
		$ScheduleArray[$item->getIndex()] = '0';
		
		$ScheduleObject->setScheduleArray(implode(',',$ScheduleArray));
		
		$ScheduleDAOobject->updateSchedule($ScheduleObject);
		
	}


?>