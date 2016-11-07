<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    //echo date("Ymd");
    //echo(mt_rand(10000000,99999999));

    date_default_timezone_set('Asia/Colombo');
    $conn = null;
    require_once("../../config.conf");
    require_once ("../../../database/database.php");
    if (!isset($_SESSION["email"])){
        header('Location: '."../password_reset.php");
    }
    $code = $_REQUEST["verification_code"];
    $target = 0;
    $email = $_SESSION["email"];
    $query = "SELECT * FROM member WHERE email='$email'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    
    $password_reset_code = $row['password_reset_code'];
    $password_reset_block = $row['password_reset_block']; //k
    $password_reset_attempts = $row['password_reset_attempts']; //k
    $reset_code_enabled = $row['reset_code_enabled']; //k
    $code_gen_date = $row['code_gen_date'];
    if ((strtotime(date('Y-m-d H:i:s'))-strtotime($password_reset_block))/3600 > 24){
        if (isset($_SESSION["block"])){
            unset($_SESSION["block"]);
        }
        if($password_reset_attempts <=0){
            $_SESSION["block"]="yes";
            $_SESSION["code_active"]=0;
            header('Location: '."../account_blocked.php");
        }else{
            if($reset_code_enabled == 1){
                if($password_reset_code==$code){

                    $_SESSION["validation_success"]=1;
                    $_SESSION["badtry"]=0;

                    $codegenquery ="UPDATE member SET password_reset_attempts=3,reset_code_enabled=0 WHERE email=\"$email\";";
                    $res = mysqli_query($conn,$codegenquery);
                    
                    echo "match";
                    header('Location: '."../new_password.php");

                }else{
                    $password_reset_attempts -=1;
                    $_SESSION["validation_success"]=0;
                    $_SESSION["badtry"]=1;
                    $codegenquery ="UPDATE member SET password_reset_attempts=$password_reset_attempts WHERE email=\"$email\";";
                    $res = mysqli_query($conn,$codegenquery);
//                    if ($res){
//                        echo "done";
//                    }else{
//                        echo mysqli_error($conn);
//                    }
                    if ($password_reset_attempts>0){
                        header('Location: '."../verification_code.php");
                    }else{
                        $nowtime = date('Y-m-d H:i:s');
                        $codegenquery ="UPDATE member SET password_reset_block='$nowtime',password_reset_attempts=3 WHERE email=\"$email\";";
                        $res = mysqli_query($conn,$codegenquery);
                        $_SESSION["block"]="yes";
                        $_SESSION["code_active"]=0;
                        header('Location: '."../account_blocked.php");
                    }
                }
            }else{
                header('Location: '."../password_reset.php");
            }
        }
        
    }else{
        $_SESSION["block"]="yes";
        $_SESSION["code_active"]=0;
        header('Location: '."../account_blocked.php");
    }

?>