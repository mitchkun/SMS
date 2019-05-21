<?php



require "Utilities/REQUIRE_SETTINGS.php";

require "Utilities/Payment/Payment.php";

require "Utilities/Course/CourseExt.php";

require "Utilities/Course/Course.php";



$edit = false;

$payment = new Payment();



if(isset($_GET['id'])) {

    $edit = true;

    if(!$payment->create_from_id($_GET['id']))

    {

        die ("Something went wrong");

    }



}





?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>

        <?php

        if($edit)

            echo "Edit Payment";

        else

            echo "Add Payment";

        ?>

    </title>

    <!-- BOOTSTRAP STYLES-->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

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

        <a class="navbar-brand" style="background: #3F51B5;color: #fff;font-size: 22px" href="index.php"><?php echo SYSTEM_NAME ?></a>

    </div>

    <div style="color: white;

padding: 15px 50px 5px 50px;

float: right;

font-size: 16px;"> </div>

</nav>



<!-- NAV SIDE -->



<?php



require('nav_side.php');

?>



<!-- END NABV SIDE -->

<div id="page-wrapper" >

    <div id="page-inner">





        <div class="row" style="padding: 2%;">



            <form action="Utilities/Payment/register_payment.php<?php if($edit){echo "?id=" . $course->ID;}?> " method="post">

                <div class="form-group">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <?php

                            if($edit)

                                echo "Edit Payment";

                            else

                                echo "Add Payment";

                            ?>                        </div>

                        <div class="modal-body">



                            <?php



                            echo "<select id='course_id' class=\"form-control\" style='width: 100%;' name='course_id'><option  value='-1'>Select Grade</option>";

                            $course_ids = getAllCourseIds();

                            foreach ($course_ids as $id) {

                                $course = new Course();

                                if (!$course->create_from_id($id))

                                    continue;



                                $name = $course->name;

                                echo "<option  value=\"$id\">$name</option>";

                            }

                            echo "</select>";



                            ?>

                            <div id="select_student"></div>


                            <br>

                            <input  oninput="update()" id="amount" type="text" name="amount"  class="form-control" placeholder="Amount" />

                            <br>
                            
                            <input  oninput="update()" id="date" type="text" name="date"  class="form-control" placeholder="Date Paid: YYYY-MM-DD"/>

                            <br>
                                
                                
                            <?php

                            if($edit)

                            {

                                echo "<div  id=\"submit_button\"><button type=\"button\" class=\"btn btn-primary btn-lg\" style=\"width: 100%\">

                                SAVE

                            </button>";

                            }

                            else

                            {

                               echo "<div  id=\"submit_button\"><button type=\"button\" class=\"btn btn-disabled btn-lg\" style=\"width: 100%\">

                                SAVE

                            </button>
";

                            }

                            ?>


                                <br>
<p><strong>*Not Required</strong></p>
                            </div>



                        </div>

                    </div>







            </form>







        </div>

    </div>





</div>

<script src="assets/js/jquery-1.10.2.js"></script>

<!-- BOOTSTRAP SCRIPTS -->

<script src="assets/js/bootstrap.min.js"></script>

<!-- METISMENU SCRIPTS -->

<script src="assets/js/jquery.metisMenu.js"></script>

<!-- DATA TABLE SCRIPTS -->

<script src="assets/js/dataTables/jquery.dataTables.js"></script>

<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

<script>

    $(document).ready(function () {

        $('#dataTables-example').dataTable();

    });

</script>

<!-- CUSTOM SCRIPTS -->

<script src="assets/js/custom.js"></script>

<script type="text/javascript">



     function update() {

         var error = 0;



         if($('#course_id').val() == '-1')

         {

             error = 1;

         }

         if($('#date').val() == '-1')

         {

             error = 1;

         }

         if($('#student_id').val() == '-1')

         {

             error = 1;

         }



         if($('#amount').val() == "")

         {

             error = 1;

         }



         if(error == 1)

         {

             $('#submit_button').html('<button  type="button" class="btn btn-disabled btn-lg" style="width: 100%">SAVE</button>');

         }

         else

         {

             $('#submit_button').html('<button type="submit" class="btn btn-primary btn-lg" style="width: 100%">SAVE</button>');

         }

    };

    $('#course_id').click(function () {

        update();



    });



     $('#course_id').click(function () {

         update();

         var course_id = $('#course_id').val();



         if(course_id == "-1") {

             $('#select_student').html("").fadeOut(750);

             return;

         }



         $.post('Utilities/Student/Extensions/get_students_using_course.php',{ course_id: course_id },function (output) {

             $('#select_student').html("<br>" + output).fadeIn(750);

             update();

         });







     })



</script>

</body>

</html>

