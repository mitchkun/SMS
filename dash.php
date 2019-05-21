<?php



require "Utilities/REQUIRE_SETTINGS.php";

require "Utilities/URL_MANAGER.php";

require "Utilities/Course/CourseExt.php";

//require "Utilities/Course/Course.php";



require "Utilities/Subject/Subject.php";

require "Utilities/Subject/SubjectExt.php";

require "Utilities/User/User.php";

require "Utilities/User/UserExt.php";

require "Utilities/Student/StudentExt.php";

require "Utilities/Student/Student.php";

require "Utilities/Course/Course.php";



?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php  echo "Dashboard" ?></title>

    <!-- BOOTSTRAP STYLES-->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/all.css" rel="stylesheet" />

    <!-- MORRIS CHART STYLES-->

    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <!-- CUSTOM STYLES-->

    <link href="assets/css/custom.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->

</head>

<body>

<div id="wrapper" ">

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background: #3F51B5;">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

        </button>

        <a class="navbar-brand" style="background: #3F51B5;color: #fff;font-size: 22px" href=""><?php echo SYSTEM_NAME ?></a> <h1 style="float: right;color: #fff">Dashboard</h1>

    </div>

    <div style="color: white;

padding: 15px 50px 5px 50px;

float: right;

font-size: 16px;"> <!--<a href="register_student.php" class="btn btn-danger square-btn-adjust">New Student</a>--> </div>

</nav>



<!-- NAV SIDE -->



<?php



require('nav_side.php');

?>



<!-- END NABV SIDE -->

<div id="page-wrapper" >

    <div id="page-inner">





        <!-- /. ROW  -->

        <div class="row" style="padding: 2%; line-height: 120px" >

            
            <img src="assets/img/7.jpeg" class="user-image2"/>
            <img src="assets/img/8.jpeg" class="user-image2"/>
            <img src="assets/img/2.jpeg" class="user-image2"/>

            <p style="padding: 2%; line-height: 120px; text-align: center">
           <?php  
            
            if($_SESSION[SESSION_ACCESS]== 0 || $_SESSION[SESSION_ACCESS]== 3)
                echo "<a  href='students.php'><i title='Students' class='fas fa-user-graduate' style='font-size:112px' alt='students' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>
            <!--<li>

                <a  href="students.php"><i ></i> Students</a>

            </li>-->
            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 1)
                echo "<a  href='students_T.php'><i title='Students' class='fas fa-user-graduate' style='font-size:112px'></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>
            
            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 2)
                echo "<a  href='students_B.php'><i title='Students' class='fas fa-user-graduate' style='font-size:112px'></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>


            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 2 || $_SESSION[SESSION_ACCESS]== 0 || $_SESSION[SESSION_ACCESS]== 3)
                echo "<a  href='courses.php'><i title='Class' class='fas fa-university' style='font-size:112px' aria-hidden='true'></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>
            <!--<li>

                <a  href="courses.php"><i ></i> Grade/Form</a>

            </li>-->
            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 2 || $_SESSION[SESSION_ACCESS]== 0 || $_SESSION[SESSION_ACCESS]== 3)
                echo "<a  href='payments_1.php'><i title='Expenditures' class='fas fa-balance-scale' style='font-size:112px' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>
            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 2 || $_SESSION[SESSION_ACCESS]== 0 || $_SESSION[SESSION_ACCESS]== 3)
                echo "<a  href='payments.php'><i title='Payments' class='fas fa-wallet' style='font-size:112px' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>
            <!--<li>

                <a  href="payments.php"><i ></i> Payments</a>

            </li>-->

            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 0)
                echo "<a  href='users.php'><i title='Users' class='fa fa-user' style='font-size:112px' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?>
            <!--<li>

                <a  href="users.php"><i ></i> Users</a>

            </li>-->
            <?php  
            
            if($_SESSION[SESSION_ACCESS]== 0 || $_SESSION[SESSION_ACCESS]== 3)
                echo "<a  href='register'><i title='Register' class='fas fa-user-plus' style='font-size:112px' aria-hidden='true'></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            else
                echo "";
            
            ?><p/>
            <div id="stud"></div>
            

                    </div>



                </div>

            </div>

                    <!--End Advanced Tables -->



            





        </div>

    </div>



<div id="temp"></div>

</div>

<script src="assets/js/jquery-1.10.2.js"></script>

<!-- BOOTSTRAP SCRIPTS -->

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/all.js"></script>

<!-- METISMENU SCRIPTS -->

<script src="assets/js/jquery.metisMenu.js"></script>

<!-- DATA TABLE SCRIPTS -->

<script src="assets/js/dataTables/jquery.dataTables.js"></script>

<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

<script>

    $(document).ready(function () {

        //$('#dataTables-example').dataTable();

    });

</script>

<!-- CUSTOM SCRIPTS -->

<script src="assets/js/custom.js"></script>



<script type="text/javascript">




    function delete_item(id) {



        var table = "students";



        $.post('Utilities/FileManager/delete.php',{ t: table, i:id },function (output) {

            $('#temp').html(output);

        });

    }

   $('#course_id').click(function () {

         //update();

         var course_id = $('#course_id').val();
         
         



         if(course_id == "-1") {

             $('#stud').html("").fadeOut(750);

             return;

         }



         $.post('Utilities/Student/Extensions/get_students_using_course_1.php',{ course_id: course_id },function (output) {

             $('#stud').html("<br>" + output).fadeIn(750);

             //update();

         });
         
          })


</script>



</body>

</html>

