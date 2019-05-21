<?php
/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 22/02/2017
 * Time: 5:43 PM
 */

session_start();

define("SYSTEM_NAME","COLLEGE SYSTEM");
define("DATABASE_HOST","localhost");
define("DATABASE_NAME","leonappl_college");
define("DATABASE_USERNAME","leonappl_mitchell");
define("DATABASE_PASSWORD","Asdfgf@123");
define("SYSTEM_VERSION","v1.0");
define("FAVICON_URL","");
define("REQUIRE_CONNECTION","http://localhost/School/Utilities/Database/Connection.php");
define("REQUIRE_DATE","/home/leonappl/demo.leonapplications.com/college/Utilities/Date/Date.php");
define("WEBSITE_URL","http://localhost/School/");

//SESSION
define("SESSION_USER_NAME","collegesystemuseremail");
define("SESSION_DISPLAY_NAME","collegesystemuserdisplayemail");
define("SESSION_USER_ID","collegesystemuserid");

if(!isset($_GET['a']))
{
    if(!isset($_SESSION[SESSION_USER_NAME])) {
        $url = WEBSITE_URL . "login/";
        echo "<script>window.location.href='$url'</script>";
    }
    return;
}
