<?php
/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 06/03/2017
 * Time: 1:02 PM
 */

require "receiptExt.php";
require "../REQUIRE_SETTINGS.php";

$html = getReceiptHTML($_GET['id'],"../Payment/Payment.php","../Student/Student.php","../Course/Course.php");
echo $html;