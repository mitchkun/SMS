<?php
/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 26/02/2017
 * Time: 10:45 AM
 */

require "../REQUIRE_SETTINGS.php";

$username = DATABASE_USERNAME;
$password = DATABASE_PASSWORD;
$host = DATABASE_HOST;
$dbname = DATABASE_NAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$db;

try
{

    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
}
catch(PDOException $ex)
{

    die("Failed to connect to the database: " . $ex->getMessage());
}


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


if(!isset($_POST))
{
    error();
    return;
}
if(!isset($_POST['t']) || !isset($_POST['i']))
{
    error();
    return;
}

$table = $_POST['t'];
$id = $_POST['i'];



      $query = "DELETE FROM $table WHERE ID = $id";


    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();

        echo "<script>window.location.href='javascript:location.reload();';</script>";


    }
    catch (PDOException $ex) {
        echo '<script language="javascript">';
        echo "alert('Done')";
        echo '</script>';
    }

     function error()
     {
         echo '<script language="javascript">';
         echo 'alert("Error")';
         echo '</script>';
         return;
     }