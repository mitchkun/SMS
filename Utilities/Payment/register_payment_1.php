<?php/** * Created by PhpStorm. * User: Leon * Date: 24/02/2017 * Time: 7:53 PM */require "../REQUIRE_SETTINGS.php";require "../URL_MANAGER.php";require "PaymentExt_1.php";$supplier1 = $_POST['supplier'];$descr1 = $_POST['descr'];$dept1 = $_POST['dept'];$ref1 = $_POST['ref'];$amount1 = $_POST['amount'];$inv_num1 = $_POST['inv_num'];$type = $_POST['method'];$date = $_POST['date'];//$balance =$_POST['balance'];$done = false;        if(isset($_GET['id']))        {            $keys = array("student_id","course_id","fees","balance");            $values = array($student_id,$course_id,$fees,$balance);            $done = updateCourseInfo2($_GET['id'],$keys,$values);        }        else {            $done = createPayment2($supplier1,$descr1,$amount1,$dept1,$ref1,$inv_num1, $type,$date);        }if($done){    message("Saved");    url_open(url_payments1(getLastPaymentId2()));}else{    message("Something went wrong");    url_open(url_back_page());}function message($message) {        echo '<script language="javascript">';    echo 'alert("' . $message . '")';    echo '</script>';}