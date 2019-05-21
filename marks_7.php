﻿<?phprequire "Utilities/REQUIRE_SETTINGS.php";require "Utilities/URL_MANAGER.php";require "Utilities/Course/CourseExt.php";require "Utilities/Subject/Subject.php";require "Utilities/Subject/SubjectExt.php";require "Utilities/Student/StudentExt.php";require "Utilities/Student/Student.php";require "Utilities/Course/Course.php";?><!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml"><head>    <meta charset="utf-8" />    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <title><?php  echo "Marks" ?></title>    <!-- BOOTSTRAP STYLES-->    <link href="assets/css/bootstrap.css" rel="stylesheet" />    <!-- FONTAWESOME STYLES-->    <link href="assets/css/font-awesome.css" rel="stylesheet" />    <!-- MORRIS CHART STYLES-->    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />    <!-- CUSTOM STYLES-->    <link href="assets/css/custom.css" rel="stylesheet" />    <!-- GOOGLE FONTS--></head>    <body onload="sortTable()"><div id="wrapper" ><nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background: #3F51B5;">    <div class="navbar-header">        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">            <span class="sr-only">Toggle navigation</span>            <span class="icon-bar"></span>            <span class="icon-bar"></span>            <span class="icon-bar"></span>        </button>        <a class="navbar-brand" style="background: #3F51B5;color: #fff;font-size: 22px" href=""><?php echo SYSTEM_NAME ?></a> <h1 style="float: right;color: #fff">Religious Education Marks</h1>    </div>    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <a href="students_1.php?name=religious" class="btn btn-danger square-btn-adjust">Add Marks</a> </div></nav><!-- NAV SIDE --><?phprequire('nav_side.php');?><!-- END NABV SIDE --><div id="page-wrapper" >    <div id="page-inner">        <!-- /. ROW  -->        <div class="row" style="padding: 2%;">            <?php$subjname = "religious";            //$ids = getAllStudentsIds();                        $number_of_ids = 0;            //foreach ($ids as $id)                $number_of_ids++;            echo "<div class=\"panel panel-default\">                <div class=\"panel-heading\">                    $number_of_ids students                </div>                <div class=\"panel-body\">                                    ";                                        echo "<select id='course_id' class=\"form-control\" style='width: 100%;' name='course_id'><option  value='-1'>Select Grade</option>";                            $course_ids = getAllCourseIds();                            foreach ($course_ids as $id) {                                $course = new Course();                                if (!$course->create_from_id($id))                                    continue;                                $name = $course->name;                                                                if(($_GET['course']) == $id)                                      echo "<option selected='selected' id='select' value=\"$id\">$name</option>";                                else                                    echo "<option value=\"$id\">$name</option>";                                                            }                            echo "</select>";$_SESSION['term'] = 1;?>            <div id="stud"></div>        </div>    </div><div id="temp"></div></div><script src="assets/js/jquery-1.10.2.js"></script><!-- BOOTSTRAP SCRIPTS --><script src="assets/js/bootstrap.min.js"></script><!-- METISMENU SCRIPTS --><script src="assets/js/jquery.metisMenu.js"></script><!-- DATA TABLE SCRIPTS --><script src="assets/js/dataTables/jquery.dataTables.js"></script><script src="assets/js/dataTables/dataTables.bootstrap.js"></script><script>    $(document).ready(function () {        $('#dataTables-example').dataTable();    });</script><!-- CUSTOM SCRIPTS --><script src="assets/js/custom.js"></script><script type="text/javascript">    function delete_item(id) {        var table = "science";        $.post('Utilities/FileManager/delete.php',{ t: table, i:id },function (output) {            $('#temp').html(output);        });    }function sortTable() {  var table, rows, switching, i, x, y, shouldSwitch;  table = document.getElementById("myTable");  switching = true;  /*Make a loop that will continue until  no switching has been done:*/  while (switching) {    //start by saying: no switching is done:    switching = false;    rows = table.getElementsByTagName("TR");    /*Loop through all table rows (except the    first, which contains table headers):*/    for (i = 1; i < (rows.length - 1); i++) {      //start by saying there should be no switching:      shouldSwitch = false;      /*Get the two elements you want to compare,      one from current row and one from the next:*/      x = rows[i].getElementsByTagName("TD")[4];      y = rows[i + 1].getElementsByTagName("TD")[4];      //check if the two rows should switch place:      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {        //if so, mark as a switch and break the loop:        shouldSwitch = true;        break;      }    }    if (shouldSwitch) {      /*If a switch has been marked, make the switch      and mark that a switch has been done:*/      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);      switching = true;    }  }  var pos = 1;  rows = table.getElementsByTagName("TR");  for (i = 1; i <= (rows.length - 1); i++){            var row = rows[i].getElementsByTagName("TD")[0];      row.innerHTML = pos;      pos++;      //m.innerHTML = pos++;  }}</script><script type="text/javascript">    function delete_item(id) {        var table = "students";        $.post('Utilities/FileManager/delete.php',{ t: table, i:id },function (output) {            $('#temp').html(output);        });    }       $('#course_id').click(function () {         //update();         var course_id = $('#course_id').val();                           if(course_id == "-1") {             $('#stud').html("").fadeOut(750);             return;         }         var name = "Utilities/Student/Extensions/get_students_using_course_3.php?name=" + "<?php echo $subjname ?>";         $.post(name,{ course_id: course_id },function (output) {             $('#stud').html("<br>" + output).fadeIn(750);             //update();         });                   })            </script></body></html>