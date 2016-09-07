<?php

if(isset($_POST['submit'])){
    createUser();
}else{
    header("location:index.php");
}

function createUser(){

    $conn = null;
    require_once("../config.conf");
    require_once ("../../database/database.php");
    session_start();

    // Get password and hash it.
    $pword = mysqli_real_escape_string($conn,$_POST['password']);
    $c_password = mysqli_real_escape_string($conn,$_POST['com_pw']);

    if($pword != $c_password){
        header("location:setupProfile.php");
    }else{
        $password = password_hash($pword,PASSWORD_DEFAULT);
    }

    //Get profile picture..

    if(isset($_FILES['pro_pic_img'])){
        $targetDir = "../../images/pro_pic/";
        $uploadImgName = $_FILES['pro_pic_img']['name'];
        $uploadImgSize = $_FILES['pro_pic_img']['size'];
        $imgExtention = strtolower(pathinfo($uploadImgName,PATHINFO_EXTENSION));
        $userImg = rand(1000,1000000).".".$imgExtention;
        $targetFile = $targetDir.$userImg;

        if ($uploadImgSize<5000000 AND $uploadImgSize > 0){
            if(!move_uploaded_file($_FILES['pro_pic_img']['tmp_name'],$targetFile)){
                echo " not moved";
            }
        }
    }

    $email = $_SESSION['email'];

    //Get basic data
    $fname = mysqli_real_escape_string($conn,$_POST['firstName']);

    $mname_tmp = mysqli_real_escape_string($conn,$_POST['middlename']);
    $mname = $mname_tmp != "" ? $mname_tmp : "Not set";

    $lname = mysqli_real_escape_string($conn,$_POST['lastname']);

    $username = substr(strtolower($fname),0,-2)."_".substr(strtolower($lname),0,-2);

    $category = mysqli_real_escape_string($conn,$_POST['category']);

    $aca_year_temp = mysqli_real_escape_string($conn,$_POST['academic_year']);
    $aca_year = $aca_year_temp != "" ? $aca_year_temp : 0000;

    $gender = mysqli_real_escape_string($conn,$_POST['gender']);


    $qry_to_insert = "INSERT INTO member(username,email,password,first_name,middle_name,last_name,category,academic_year,joined_date,gender,profile_picture,profile_completed) VALUES ('$username','$email','$password','$fname','$mname','$lname','$category','$aca_year',NOW(),'$gender','$userImg',1)";

    //echo base64_encode('remalsha@gmail.com'); //cmVtYWxzaGFAZ21haWwuY29t

    $response = mysqli_query($conn,$qry_to_insert);

    if ($response){
        if (session_destroy()){
            header("location:../../index.php");
        }
    }else{
        header("location:index.php");
        //echo mysqli_error($conn);
    }




    

}

