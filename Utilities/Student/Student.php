<?php



/**

 * Created by PhpStorm.

 * User: leon-pc

 * Date: 11/16/2016

 * Time: 10:05 AM

 */

class Student

{

   public $ID,$surname,$student_id,$name,$id_number,$address,$phone_number,$course_id,$date_created,$balance,$parent,$total,$attendance,$comment,$conduct,$head_comm;



    public function create_from_id($id)

    {

        require (REQUIRE_CONNECTION);

        $query = " 

            SELECT  

                *

            FROM students 

            WHERE ID = '" . $id . "'

        ";





        try {

            $stmt   = $db->prepare($query);

            $result = $stmt->execute();

        }

        catch (PDOException $ex) {

            die ($ex);

            return false;

        }



        $data = $stmt->fetch();
        

        if(isset($data) && isset($data['ID']))

        {

            $this->ID = $data['ID'];
            
            $this->surname = $data['surname'];
            
            $this->student_id = $data['student_id'];

            $this->id_number = $data['id_number'];

            $this->phone_number = $data['phone_number'];

            $this->name = $data['name'];

            $this->address = $data['address'];

            $this->course_id = $data['course_id'];

            $this->date_created = $data['date_created'];
            
            $this->balance = $data['balance'];
            
            $this->parent = $data['parent_guardian'];
            
            $this->total = $data['total'];
            
            $this->attendance = $data['attendance'];
            
            $this->comment = $data['comment'];
            
            $this->conduct = $data['conduct'];
            
            $this->head_comm = $data['head_comm'];

            return true;

        }

        else

            return false;

    }

}