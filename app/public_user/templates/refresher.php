<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $email = $_SESSION['email'] ;
    $query2 = "SELECT * FROM member join system_role on member.system_role = system_role.system_role_id and member.email='$email' ";

    //Execute the query.
    $result = mysqli_query($conn,$query2);

    $row = mysqli_fetch_assoc($result);

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
    $_SESSION['system_member_suspend_power_needed'] = $row['system_member_suspend_power_needed'];
    $_SESSION['system_member_delete_power'] = $row['system_member_delete_power'];
    $_SESSION['system_member_delete_power_needed'] = $row['system_member_delete_power_needed'];
    $_SESSION['system_meeting_request_power'] = $row['system_meeting_request_power'];
    $_SESSION['system_meeting_request_power_needed'] = $row['system_meeting_request_power_needed'];
    $_SESSION['system_group_create_power'] = $row['system_group_create_power'];
    $_SESSION['system_vision_power'] = $row['system_vision_power'];
    $_SESSION['system_add_system_role'] = $row['system_add_system_role'];
    $_SESSION['system_change_system_role'] = $row['system_change_system_role'];
    $_SESSION['system_delete_system_role'] = $row['system_delete_system_role'];
    $_SESSION['system_member_change_power'] = $row['system_member_change_power'];
    $_SESSION['system_member_change_power_needed'] = $row['system_member_change_power_needed'];
?>