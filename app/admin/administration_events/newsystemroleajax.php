<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/8/16
 * Time: 1:55 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
$query2 = "SELECT email, system_role_id, name, system_admin_panel_access, system_member_add_power, system_member_suspend_power, system_member_suspend_power_needed, system_member_delete_power, system_member_delete_power_needed, system_meeting_request_power, system_meeting_request_power_needed, system_member_change_power, system_member_change_power_needed, system_group_create_power, system_vision_power, system_member_add_power_needed, system_add_system_role, system_change_system_role, system_delete_system_role FROM member JOIN system_role on member.system_role = system_role.system_role_id and email=\"".$_SESSION['email']."\"";
$res2 = mysqli_query($conn,$query2);
$my = mysqli_fetch_assoc($res2);

if ($my['system_add_system_role'] == 1){
    $name =  mysqli_escape_string($conn,$_POST['txt_role_name']);
    $adminpanelaccess =  (isset($_POST['chk_admin_panel_access'])?1:0);
    $memberaddpower =  $_POST['txt_add_member_power'];
    $memberaddpowerneeded = $_POST['txt_add_member_power_needed'];
    $membersuspendpower = $_POST['txt_suspend_members_power'];
    $membersuspendpowerneeded = $_POST['txt_suspend_members_power_needed'];
    $meetingrequestpower = $_POST['txt_meeting_request_power'];
    $meetingrequestpowerneeded = $_POST['txt_meeting_request_power_needed'];
    $creategroup =  (isset($_POST['chk_create_group'])?1:0);
    $visionpower = $_POST['txt_vision_power'];
    $memberdeletepower = $_POST['txt_member_delete_power'];
    $memberdeletepowerneeded = $_POST['txt_member_delete_power_needed'];
    $memberchangepower = $_POST['txt_member_change_power'];
    $memberchangepowerneeded = $_POST['txt_member_change_power_needed'];
    $createsystemroles =  (isset($_POST['chk_create_system_roles'])?1:0);
    $changesystemroles =  (isset($_POST['chk_change_system_roles'])?1:0);
    $deletesystemroles =  (isset($_POST['chk_delete_system_roles'])?1:0);


    $query = "INSERT INTO 
            system_role(
            name, 
            system_admin_panel_access, 
            system_member_add_power, 
            system_member_suspend_power, 
            system_member_suspend_power_needed, 
            system_member_delete_power, 
            system_member_delete_power_needed, 
            system_meeting_request_power, 
            system_meeting_request_power_needed, 
            system_member_change_power, 
            system_member_change_power_needed, 
            system_group_create_power, 
            system_vision_power, 
            system_member_add_power_needed, 
            system_add_system_role, 
            system_change_system_role, 
            system_delete_system_role)
            VALUES (
            \"$name\",
            $adminpanelaccess,
            $memberaddpower,
            $membersuspendpower,
            $membersuspendpowerneeded,
            $memberdeletepower,
            $memberdeletepowerneeded,
            $meetingrequestpower,
            $meetingrequestpowerneeded,
            $memberchangepower,
            $memberchangepowerneeded,
            $creategroup,
            $visionpower,
            $memberaddpowerneeded,
            $createsystemroles,
            $changesystemroles,
            $deletesystemroles
            )";


    $custom_result = mysqli_query($conn,$query);
    if ($custom_result){
        echo "success";
    }else{
        //echo mysqli_error($conn);
        echo "0x2";
    }
    //echo mysqli_escape_string($conn,$name);
}else{
    echo "0x1";
}


/*
echo isset($_POST['chk_admin_panel_access']);
echo "<br>";
echo $_POST['txt_add_member_power'];
echo "<br>";
echo $_POST['txt_add_member_power_needed'];
echo "<br>";
echo $_POST['txt_suspend_members_power'];
echo "<br>";
echo $_POST['txt_suspend_members_power_needed'];
echo "<br>";
echo $_POST['txt_meeting_request_power'];
echo "<br>";
echo $_POST['txt_meeting_request_power_needed'];
echo "<br>";
echo isset($_POST['chk_create_group']);
echo "<br>";
echo $_POST['txt_vision_power'];
echo "<br>";
echo isset($_POST['chk_create_system_roles']);
echo "<br>";
echo isset($_POST['chk_change_system_roles']);
echo "<br>";
echo isset($_POST['chk_delete_system_roles']);
echo "<br>";
*/