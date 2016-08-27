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
        $query = "SELECT password FROM user WHERE email='$email' LIMIT 1";
        $res = mysqli_query($conn,$query);
        $hashed = mysqli_fetch_assoc($res);
        $hashedPW = $hashed['password'];

        //Check passwords
        $comparePW = password_verify($pword,$hashedPW);

        /*echo "<script type='text/javascript'> alert($comparePW);</script>";*/

        if (!$comparePW){
            header("location:../../index.php?error=1");
        }else{
            //Query to fectch user login data from database
            $query2 = "SELECT * FROM user WHERE email='$email'";

            //Execute the query.
            $result = mysqli_query($conn,$query2);

            $row = mysqli_fetch_assoc($result);

            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $row['firstname'];
            $_SESSION['lname'] = $row['lastname'];
            $_SESSION['pro_pic'] = $row['pro_pic'];
            $_SESSION['type'] = $row['type'];

            header('location:dashboard.php');
        }

    }
}

?>
