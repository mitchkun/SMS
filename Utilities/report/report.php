<?php/** * Created by PhpStorm. * User: Leon * Date: 06/03/2017 * Time: 1:02 PM */require "reportExt.php";require "../REQUIRE_SETTINGS.php";$html = getReportHTML($_GET['id'],"../Subject/Subject.php","../Student/Student.php","../Course/Course.php");echo $html;