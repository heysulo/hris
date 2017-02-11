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
require_once("../../templates/refresher.php");
$query1 = "SELECT * FROM system_role WHERE system_role_id = ".$_SESSION['seletced_role_id'];
$res1 = mysqli_query($conn,$query1);
$row = mysqli_fetch_assoc($res1);

if ($_SESSION['system_add_system_role'] == 1 && $_SESSION['system_member_change_power'] >= $row['system_member_change_power_needed'] && $_SESSION['system_change_system_role']=="1"){
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


    $query = "UPDATE system_role SET
            name=\"$name\",
            system_admin_panel_access=$adminpanelaccess,
            system_member_add_power=$memberaddpower,
            system_member_suspend_power=$membersuspendpower,
            system_member_suspend_power_needed=$membersuspendpowerneeded,
            system_member_delete_power=$memberdeletepower,
            system_member_delete_power_needed=$memberdeletepowerneeded,
            system_meeting_request_power=$meetingrequestpower,
            system_meeting_request_power_needed=$meetingrequestpowerneeded,
            system_member_change_power=$memberchangepower,
            system_member_change_power_needed=$memberchangepowerneeded,
            system_group_create_power=$creategroup,
            system_vision_power=$visionpower,
            system_member_add_power_needed=$memberaddpowerneeded,
            system_add_system_role=$createsystemroles,
            system_change_system_role=$changesystemroles,
            system_delete_system_role=$deletesystemroles 
            WHERE system_role_id=".$_SESSION['seletced_role_id'];


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