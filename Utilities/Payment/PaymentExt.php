<?php

/**

 * Created by PhpStorm.

 * User: leon-pc

 * Date: 11/16/2016

 * Time: 10:12 AM

 */



function getAllPaymentsIds1()

{

    require (REQUIRE_CONNECTION);





    $query = " 

            SELECT  

                *

            FROM payments
        ";





    try {

        $stmt   = $db->prepare($query);

        $result = $stmt->execute();

    }

    catch (PDOException $ex) {

        echo $ex;

        return null;

    }



    $ids = array();



    while ($data = $stmt->fetch())

    {

        $ids[] = $data['ID'];

    }

    rsort($ids);

    return $ids;

}

function getAllPaymentsId1($student_id)

{

    require (REQUIRE_CONNECTION);





    $query1 = " 

            SELECT  

                *

            FROM payments
            WHERE student_id = '$student_id'

        ";





    try {

        $stmt1   = $db->prepare($query1);

        $result1 = $stmt1->execute();

    }

    catch (PDOException $ex) {

        echo $ex;

        return null;

    }



    $ids1 = array();



    while ($data1 = $stmt1->fetch())

    {

        $ids1[] = $data1['ID'];

    }

    rsort($ids1);

    return $ids1;

}

function getAllPaymentsIdC($course_id)

{

    require (REQUIRE_CONNECTION);





    $query1 = " 

            SELECT  

                *

            FROM payments
            WHERE course_id = '$course_id'

        ";





    try {

        $stmt1   = $db->prepare($query1);

        $result1 = $stmt1->execute();

    }

    catch (PDOException $ex) {

        echo $ex;

        return null;

    }



    $ids1 = new SplFixedArray(100);
    $num = 0;


    while ($data1 = $stmt1->fetch())

    {

        $ids1[$num] = $data1['ID'];
        $num++;

    }

    //rsort($ids1);

    return $ids1;

}

function getAllPaymentsIddate1($dateB, $dateE)

{

    require (REQUIRE_CONNECTION);





    $query1 = " 

            SELECT  

                *

            FROM payments
           WHERE (date BETWEEN '$dateB'
                AND '$dateE')

        ";





    try {

        $stmt1   = $db->prepare($query1);

        $result1 = $stmt1->execute();

    }

    catch (PDOException $ex) {

        echo $ex;

        return null;

    }



    $ids1 = new SplFixedArray(1000);
    $num = 0;



    while ($data1 = $stmt1->fetch())

    {

        $ids1[$num] = $data1['ID'];
        $num++;
    }

    //rsort($ids1);

    return $ids1;

}

function getLastPaymentId1()

{

    $ids = getAllPaymentsIds1();

    return $ids[0];

}

function createPayment1($student_id,$course_id,$amount,$date)

{

    require (REQUIRE_CONNECTION);

    require (REQUIRE_DATE);
    
    $query2 = " 

            SELECT  

                balance

            FROM students 

            WHERE ID = '" . $student_id . "'

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



    $query = "INSERT INTO payments

 	( student_id,course_id,amount,date,balance) VALUES 

 	( :student_id , :course_id , :amount, :date , :balance)";



    $query_params = array(

        ':student_id' => $student_id,

        ':course_id' => $course_id,

        ':amount' => $amount,

        ':date' => $date,
        
        ':balance' => $data2['balance'] - $amount

    );



    try {

        $stmt = $db->prepare($query);

        $result = $stmt->execute($query_params);



        return true;

    }

    catch (PDOException $ex) {

        echo $ex;

        return false;

    }

    $query3 = " 

            UPDATE students SET balance = '" . $data2['balance']-$amount . "' WHERE ID = '" . $student_id . "' 

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



}

function updateCourseInfo1($id,$array_keys,$array_data)

{

    require (REQUIRE_CONNECTION);



    $pos = 0;

    foreach ($array_keys as $array_key) {



        if($array_data[$pos] == -1 || $array_data[$pos] == null)

            continue;



        $query = "UPDATE payments SET $array_key = '" . $array_data[$pos] . "' WHERE ID = '" . $id . "'";



        try {

            $stmt = $db->prepare($query);

            $result = $stmt->execute();

        } catch (PDOException $ex) {

            echo $ex;

        }



        $pos++;

    }

    return true;

}

function deletePayment($id)

{

    require (REQUIRE_CONNECTION);



    $query = "DELETE FROM payments WHERE ID =  '". $id."'";



    try {

        $stmt = $db->prepare($query);

        $result = $stmt->execute();



        return true;

    }

    catch (PDOException $ex) {

        echo $ex;

        return false;

    }



}