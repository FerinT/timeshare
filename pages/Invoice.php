<?php
/**
 * Created by PhpStorm.
 * User: maybra01
 * Date: 10/26/2016
 * Time: 4:12 PM
 */


if (session_id() == '') {
    session_start();
}

$body = $_SESSION['invoiceDetails'];



echo "<p>".$body. "</p>";


?>