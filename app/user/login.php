<?php

if(isset($_POST['loginbtn'])){
    loginUser();
}else{
    header("location:../../index.php");
}

function loginUser(){

    require_once("config.conf");
    require_once ("../database/database.php");
    session_start();

    if (isset($_POST['email']) && isset($_POST['password'])){

        //validate user input data
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        //Query to fectch user login data from database
        $query = "SELECT firstname,lastname,type,pro_pic FROM user WHERE username='$email' AND password='$password'";

        //Execute the query.
        $result = mysqli_query($conn,$query);

        //Check whether database send data;
        if (mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $row['firstname'];
            $_SESSION['lname'] = $row['lastname'];
            $_SESSION['pro_pic'] = $row['pro_pic'];
            $_SESSION['type'] = $row['type'];
            header('location:dashboard.php');
        }else{
            header("location:../../index.php?error=1");
        }
    }
}

?>
