<?php

/**
 * Created by PhpStorm.
 * User: leon-pc
 * Date: 11/16/2016
 * Time: 10:05 AM
 */
class Course
{
   public $ID,$name,$date_created,$fees;

    public function create_from_id($id)
    {
        require (REQUIRE_CONNECTION);
        $query = " 
            SELECT  
                *
            FROM course 
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
            $this->name = $data['name'];
            $this->fees = $data['fees'];
            $this->date_created = $data['date_created'];
            return true;
        }
        else
            return false;
    }
}