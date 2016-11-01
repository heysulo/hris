<?php
    
    session_start();
    if(session_id() !== ''){
        session_destroy();
    }
    session_start();
    $conn = null;
    require_once("../../config.conf");
    require_once ("../../../database/database.php");

    if (isset($_REQUEST["email"])){
        $_SESSION["reset_email"] = $email = mysqli_real_escape_string($conn,$_REQUEST["email"]);
        $_SESSION["pass"] = 50;
        $query = "SELECT * FROM member WHERE email='$email'";
        $res = mysqli_query($conn,$query);
        if (mysqli_num_rows($res)==1){
            $query2 = "SELECT * FROM member WHERE email='$email'";

            //Execute the query.
            $result = mysqli_query($conn,$query2);

            $row = mysqli_fetch_assoc($result);

            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $row['first_name'];
            $_SESSION['lname'] = $row['last_name'];
            $_SESSION['mname'] = $row['middle_name'];
            $_SESSION['usr'] = $row['profile_picture'];
            $_SESSION["pass"] = 1;
        }else{
            $_SESSION["pass"] = 0;
        }

        header('Location: '."../account_verification.php");
    }else{
        header('Location: '."../password_reset.php");
    }
?>