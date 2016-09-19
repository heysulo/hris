<?php

if(!isset($_SESSION['email'])){
    header("location:../../index.php");
}else{

    $conn = null;
    require_once("../config.conf");
    require_once ("../../database/database.php");
    session_start();

    if(isset($_POST['create_role'])){
        createRole($conn);
    }

    function createRole($conn){

        //Get user inputs

        $role_name = $_POST['role_name'];
        $allow_admin_panel_access = $_POST['allow_admin_panel_access'];
        $allow_adding_new_member = $_POST['allow_adding_new_member'];
        $allow_removing_member = $_POST['allow_removing_member'];
        $allow_changing_roles = $_POST['allow_changing_roles'];
        $allow_group_setting_modify = $_POST['allow_group_setting_modify'];
        $allow_group_deletion = $_POST['allow_group_deletion'];
        $allow_add_new_post = $_POST['allow_add_new_post'];
        $allow_delete_post = $_POST['allow_delete_post'];
        $allow_pin_post = $_POST['allow_pin_post'];
        $allow_send_email = $_POST['allow_send_email'];
        $allow_tweet = $_POST['allow_tweet'];

        $qry = "INSERT INTO group_role (name,group_admin_panel_access,group_member_add_power,group_member_remove_power,group_member_upgrade_power,group_modify_power,group_delete_power,group_notice_post_power,group_notice_delete_power,group_notice_pin_power,group_email_power ,group_tweet_power) 
                VALUES ('$role_name','$allow_admin_panel_access','$allow_adding_new_member','$allow_removing_member','$allow_changing_roles','$allow_group_setting_modify','$allow_group_deletion','$allow_add_new_post','$allow_delete_post','$allow_pin_post','$allow_send_email','$allow_tweet')";

        $res = mysqli_query($conn,$qry);

        if($res){
            echo "<script>msgbox(\" New role created.\",\"Group Roles\",0);</script>";
        }else{
            echo "<script>msgbox(\" Sorry, we unable to create your role. \",\"Group Roles\",2);</script>";
        }
    }

}

?>
