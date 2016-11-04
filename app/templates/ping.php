<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/1/16
 * Time: 6:06 PM
 */
    //$sss = "sdsd";
    //echo $_POST['id']."\n";
    //echo date("Y-m-d H:i:s");
    //echo ''.isset($_SESSION['email']);
    
    
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $conn = null;
    $email = $_SESSION['email'];
    date_default_timezone_set('Asia/Colombo');
    require_once("../user/config.conf");
    require_once ("../database/database.php");
    if (isset($_SESSION['email'])){
        $timeanddate = date("Y-m-d H:i:s");
        //

        $qry = "UPDATE member SET last_login='$timeanddate' WHERE email='$email'";
            if (mysqli_query($conn,$qry)){
                echo 1;
            }else{
                echo 0;
            }


    }


    
?>
