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
    date_default_timezone_set('Asia/Colombo');
    require_once("../../config.conf");
    require_once ("../../../database/database.php");
    if ((!isset($_SESSION["email"])) || !isset($_SESSION["validation_success"]) || ($_SESSION["validation_success"])==0 || !isset($_SESSION["badtry"]) || $_SESSION["badtry"]==1 ){
        header('Location: '."../password_reset.php");
    }else{
        $email = $_SESSION["email"];
        $pass1 = htmlspecialchars($_REQUEST["password_verify"]);
        $pass2 = htmlspecialchars($_REQUEST["password"]);
        if ($pass2==$pass1){
            if(strlen($pass2) > 6){
                $hashed_password= password_hash($pass2,PASSWORD_DEFAULT);
                $codegenquery ="UPDATE member SET reset_code_enabled=0, password_reset_attempts=3,password='$hashed_password' WHERE email=\"$email\";";
                $res = mysqli_query($conn,$codegenquery);
                session_destroy();
                if ($res){
                    header('Location: '."../success.php");
                }else{
                    //submit bug
                    header('Location: '."../failiure.php");
                }
            }else{
                header('Location: '."../new_password.php");
            }
        }else{
            header('Location: '."../new_password.php");
        }
    }
    
?>
