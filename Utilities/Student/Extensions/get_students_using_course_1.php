 <?php

/**

 * Created by PhpStorm.

 * User: Leon

 * Date: 25/02/2017

 * Time: 2:04 PM

 */

require "../../REQUIRE_SETTINGS.php";

require "../../Course/Course.php";

require "../../Course/CourseExt.php";

require "../../Student/Student.php";

require "../../Student/StudentExt.php";







$course_id = $_POST['course_id'];
$ids = getAllStudentsIds($course_id);

 echo "
     

                    <div class=\"table-responsive\">

<table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">

                            <thead>

                                        <tr>

                                            <th>Student ID</th>

                                            <th>Student Name</th>

                                             <th>Address</th>

                                            <th>Class</th>

                                            <th>Yearly Fees</th>

                                            <th>Fees Paid (To Date)</th>
                                            
                                            <th>Fees Balance</th>

                                            <th class='noPrint' >Options</th>

                                           

                                             

                                        </tr>

                                    </thead>

                                    <tbody>

                                    ";




            $totalB = 0;
            $totalFees = 0;
            $totalPay =0;
            foreach ($ids as $id)

            {

               $students = new Student();

                if(!$students->create_from_id($id))

                    continue;
                
                    
             require (REQUIRE_CONNECTION);
                
            $query2 = " 

            SELECT  

                Test1, Test2, Exam

            FROM science 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt2 = $db->prepare($query2);

            //$result = $stmt->execute();
            $result2 = $stmt2->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data2 = $stmt2->fetch();
        
        if(!$data2['Test1']=="" || !$data2['Test2']=="")
        $Test1bio = ($data2['Test1'] + $data2['Test2']) * 0.2;
        else
            $Test1bio = 0;
        //$Test2bio = $data2['Test2'];
        $Exambio = $data2['Exam'] ;
        $Test2bio = $Exambio + $Test1bio;
        

        $query3 = " 

            SELECT  

                Test1, Test2, Exam

            FROM math 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt3 = $db->prepare($query3);

            //$result = $stmt->execute();
            $result3 = $stmt3->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data3 = $stmt3->fetch();
        
        if(!$data3['Test1']=="" || !$data3['Test2']=="")
        $Test1math = ($data3['Test1'] + $data3['Test2']) * 0.2;
        else
            $Test1math = 0;
        //$Test2math = $data3['Test2'];
        $Exammath = $data3['Exam'] ;
        $Test2math = $Exammath + $Test1math;
        //$commentmath = getComment($Test2math);
        
        $query4 = " 

            SELECT  

                Test1, Test2, Exam

            FROM english 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt4 = $db->prepare($query4);

            //$result = $stmt->execute();
            $result4 = $stmt4->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data4 = $stmt4->fetch();
        
        if(!$data4['Test1']=="" || !$data4['Test2']=="")
        $Test1english = ($data4['Test1'] + $data4['Test2']) * 0.2;
        else
            $Test1english = 0;
        //$Test2english = $data4['Test2'];
        $Examenglish = $data4['Exam'] ;
        $Test2english = $Examenglish + $Test1english;
        //$commenteng = getComment($Test2english);

        $query5 = " 

            SELECT  

                Test1, Test2, Exam

            FROM homeeco 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt5 = $db->prepare($query5);

            //$result = $stmt->execute();
            $result5 = $stmt5->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data5 = $stmt5->fetch();
        
        if(!$data5['Test1']=="" || !$data5['Test2']=="")
        $Test1homeeco = ($data5['Test1'] + $data5['Test2']) * 0.2;
        else
            $Test1homeeco = 0;
        //$Test2homeeco = $data5['Test2'];
        $Examhomeeco = $data5['Exam'] ;
        $Test2homeeco = $Examhomeeco + $Test1homeeco;
        //$commentHE = getComment($Test2homeeco);
        
        $query6 = " 

            SELECT  

                Test1, Test2, Exam

            FROM siswati 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt6 = $db->prepare($query6);

            //$result = $stmt->execute();
            $result6 = $stmt6->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data6 = $stmt6->fetch();
        
        if(!$data6['Test1']=="" || !$data6['Test2']=="")
        $Test1chem = ($data6['Test1'] + $data6['Test2']) * 0.2;
        else
            $Test1chem = 0;
        //$Test2chem = $data6['Test2'];
        $Examchem = $data6['Exam'] ;
        $Test2chem = $Test1chem + $Examchem;
        //$commentchem = getComment($Test2chem);
        
        $query7 = " 

            SELECT  

                Test1, Test2, Exam

            FROM french 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt7 = $db->prepare($query7);

            //$result = $stmt->execute();
            $result7 = $stmt7->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data7 = $stmt7->fetch();
        
        if(!$data7['Test1']=="" || !$data7['Test2']=="")
        $Test1fr = ($data7['Test1'] + $data7['Test2']) * 0.2;
        else
            $Test1fr = 0;
        //$Test2chem = $data6['Test2'];
        $Examfr = $data7['Exam'] ;
        $Test2fr = $Test1fr + $Examfr;
        //$commentfr = getComment($Test2fr);
        
        $query9 = " 

            SELECT  

                Test1, Test2, Exam

            FROM agriculture 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt9 = $db->prepare($query9);

            //$result = $stmt->execute();
            $result9 = $stmt9->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data9 = $stmt9->fetch();
        
        if(!$data9['Test1']=="" || !$data9['Test2']=="")
        $Test1Ag = ($data8['Test1'] + $data9['Test2']) * 0.2;
        else
            $Test1Ag = 0;
        //$Test2chem = $data6['Test2'];
        $ExamAg = $data9['Exam'] ;
        $Test2Ag = $Test1Ag + $ExamAg;
        //$commentAg = getComment($Test2Ag);
        
        $query8 = " 

            SELECT  

                Test1, Test2, Exam

            FROM religious 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt8 = $db->prepare($query8);

            //$result = $stmt->execute();
            $result8 = $stmt8->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data8 = $stmt8->fetch();
        
        if(!$data8['Test1']=="" || !$data8['Test2']=="")
        $Test1RE = ($data8['Test1'] + $data8['Test2']) * 0.2;
        else
            $Test1RE = 0;
        //$Test2chem = $data6['Test2'];
        $ExamRE = $data8['Exam'] ;
        $Test2RE = $Test1RE + $ExamRE;
        //$commentRE = getComment($Test2RE);
        
        $query10 = " 

            SELECT  

                Test1, Test2, Exam

            FROM computers 

            WHERE student_id = $id

        ";

        
        try {

            //$stmt   = $db->prepare($query);
            $stmt10 = $db->prepare($query10);

            //$result = $stmt->execute();
            $result10 = $stmt10->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }
        
        
        $data10 = $stmt10->fetch();
        
        if(!$data10['Test1']=="" || !$data10['Test2']=="")
        $Test1ICT = ($data10['Test1'] + $data10['Test2']) * 0.2;
        else
            $Test1ICT = 0;
        //$Test2chem = $data6['Test2'];
        $ExamICT = $data10['Exam'] ;
        $Test2ICT = $Test1ICT + $ExamICT;
        //$commentICT = getComment($Test2ICT);
        
        $totalT2 = $Test2bio + $Test2math + $Test2chem + $Test2english + $Test2homeeco+ $Test2fr + $Test2RE;
        
        $query = "UPDATE  students  SET total = '" . $totalT2 . "' WHERE ID = '" . $id . "'";



        try {

            $stmt = $db->prepare($query);

            $result = $stmt->execute();

        } catch (PDOException $ex) {

            echo $ex;

        }




                $course_name = "#Deleted";

                $course = new Course();

                if($course->create_from_id($students->course_id))

                    $course_name = $course->name;
                
                $paid = $course->fees - $students->balance;
                


                $totalPay += $students->balance;
                $totalFees += $course->fees;
                $totalB += $paid;
                
                echo "                           <tr class=\"odd gradeX\">

                                            <td>$students->student_id </td>

                                            <td>$students->name $students->surname</td>

                                            <td>$students->address</td>

                                            <td>$course_name</td>

                                            <td>E" . number_format((float)$course->fees,2)."</td>

                                            <td>E" . number_format((float)$paid,2)."</td>
                                                
                                            <td>E" . number_format((float)$students->balance,2)."</td>

                                                    <td> <div class=\"btn-group noPrint\">

											  <button data-toggle=\"dropdown\" class=\"btn btn-success dropdown-toggle\">Options <span class=\"caret\"></span></button>

											  <ul class=\"dropdown-menu\">

											  <li><a href='register_student.php?id=$students->ID'>Edit</a></li>
                                                                                          <li><a href='#' onclick='delete_item($students->ID)'>Delete</a></li>
                                                                                          
											  <li class=\"divider\"></li>

	
<li><a href='Utilities/receipt_1/receipt_1.php?id=$students->ID'>View Payments</a></li>
                                                                                                <li><a href='Utilities/receipt_1/receipt_2.php?id=$students->ID'>View Ledger</a></li>
												

											  </ul>

											</div>

											</td>

                                            

                                        </tr>

                                 

                                        ";



            }
            echo "
            <tr>

                                            <td><strong>Total</strong></td>

                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td><strong>E" . number_format((float)$totalFees,2)."</strong></td>

                                            <td><strong>E" . number_format((float)$totalB,2)."</strong></td>

                                            <td><strong>E" . number_format((float)$totalPay,2)."</strong></td>

                           
                                                
                                            <td></td>
                                             
                                            </tr>

                          </tbody>

                        </table>";
            






