<?php

if(isset($_POST['loginbtn'])){
    loginUser();
}else{
    header("location:../../index.php");
}

function loginUser(){

    $conn = null;
    require_once("config.conf");
    require_once ("../database/database.php");
    session_start();

    if (isset($_POST['email']) && isset($_POST['password'])){

        //validate user input data
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pword = mysqli_real_escape_string($conn,$_POST['password']);


        //get hashed password from source
        $query = "SELECT password FROM member WHERE email='$email' LIMIT 1";
        $res = mysqli_query($conn,$query);
        $hashed = mysqli_fetch_assoc($res);
        $hashedPW = $hashed['password'];

        //Check passwords
        $comparePW = password_verify($pword,$hashedPW);

        /*echo "<script type='text/javascript'> alert($comparePW);</script>";*/

        if (!$comparePW){
            header("location:../../index.php?error=1");
            //echo mysqli_error($conn);
        }else{
            //Query to fectch user login data from database
            $query2 = "SELECT * FROM member WHERE email='$email'";

            //Execute the query.
            $result = mysqli_query($conn,$query2);

            $row = mysqli_fetch_assoc($result);

            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $row['first_name'];
            $_SESSION['lname'] = $row['last_name'];
            $_SESSION['pro_pic'] = $row['profile_picture'];
            $_SESSION['type'] = $row['category'];
            $_SESSION['user_id'] = $row['member_id'];
            $_SESSION['category'] = $row['category'];
            $_SESSION['aca_year'] = $row['academic_year'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['last_login'] = $row['last_login'];
            $_SESSION['availability_status'] = $row['availability_status'];
            $_SESSION['availability_text'] = $row['availability_text'];

            header('location:dashboard.php');
            //echo mysqli_error($conn);
        }

    }
}

?>
