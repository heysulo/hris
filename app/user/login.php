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
            $query2 = "SELECT * FROM member join system_role on member.system_role = system_role.system_role_id and member.email='$email' ";

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
            $_SESSION['system_role_name'] = $row['system_role'];
            $_SESSION['system_admin_panel_access'] = $row['system_admin_panel_access'];
            $_SESSION['system_member_add_power'] = $row['system_member_add_power'];
            $_SESSION['system_member_add_power_needed'] = $row['system_member_add_power_needed'];
            $_SESSION['system_member_suspend_power'] = $row['system_member_suspend_power'];
            $_SESSION['system_member_suspend_power_needed 	'] = $row['system_member_suspend_power_needed 	'];
            $_SESSION['system_member_delete_power'] = $row['system_member_delete_power'];
            $_SESSION['system_member_delete_power_needed'] = $row['system_member_delete_power_needed'];
            $_SESSION['system_meeting_request_power'] = $row['system_meeting_request_power'];
            $_SESSION['system_meeting_request_power_needed 	'] = $row['system_meeting_request_power_needed 	'];
            $_SESSION['system_group_create_power'] = $row['system_group_create_power'];
            $_SESSION['system_vision_power'] = $row['system_vision_power'];
            $_SESSION['system_add_system_role'] = $row['system_add_system_role'];
            $_SESSION['system_change_system_role'] = $row['system_change_system_role'];
            $_SESSION['system_delete_system_role'] = $row['system_delete_system_role'];

            //update last login data
            $qry_to_update_login_time = "UPDATE member SET last_login=NOW() WHERE email='$email'";
            mysqli_query($conn,$qry_to_update_login_time);

            header('location:dashboard.php');
            //echo mysqli_error($conn);
        }

    }
}

?>
