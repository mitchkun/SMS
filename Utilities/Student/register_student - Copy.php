<?php/** * Created by PhpStorm. * User: Leon * Date: 24/02/2017 * Time: 7:53 PM */require "../REQUIRE_SETTINGS.php";require "../URL_MANAGER.php";require "StudentExt.php";$name = $_POST['display_name'];$phone_number = $_POST['phone_number'];$course_id = $_POST['select_course'];$address = $_POST['address'];$id_number = $_POST['id_number'];//$dob =$_POST['dob'];$done = false;require (REQUIRE_CONNECTION);$query10 = "             SELECT                  id            FROM students             WHERE id_number = '" . $id . "'        ";                try {            //$stmt   = $db->prepare($query);            $stmt10 = $db->prepare($query10);            //$result = $stmt->execute();            $result10 = $stmt10->execute();        }        catch (PDOException $ex) {            die ($ex);            return false;        }                        $data10 = $stmt10->fetch();        if(isset($data10['id_number'] ))        {            $keys = array("name","id_number","address","phone_number","course_id","balance");            $values = array($name,$id_number,$address,$phone_number,$course_id,$balance);            $done = updateStudentInfo($_GET['id'],$keys,$values);             message("Updating");            url_open(url_student());        }        else {            $done = registerStudent($name, $phone_number, $address, $course_id, $id_number);        }if($done){    message("Saved");    url_open(url_student());}else{    message("Something went wrong");    url_open(url_back_page());}function message($message) {    echo '<script language="javascript">';    echo 'alert("' . $message . '")';    echo '</script>';}