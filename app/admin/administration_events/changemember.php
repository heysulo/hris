<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/7/16
 * Time: 8:26 PM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
$email = $_SESSION['selected_member_email'];
$query1 = "SELECT email, first_name, middle_name, last_name, category, course, profile_picture, force_password_reset, password_reset_block, reset_code_enabled, system_role,system_admin_panel_access,system_member_suspend_power, system_member_suspend_power_needed, system_member_delete_power_needed, system_member_change_power_needed,name,system_member_change_power,system_member_add_power,system_role_id FROM member JOIN system_role on member.system_role = system_role.system_role_id and email=\"$email\"";
$res1 = mysqli_query($conn,$query1);
$myemail = $_SESSION['email'];
$query2 = "SELECT email, first_name, middle_name, last_name, category, course, profile_picture, force_password_reset, password_reset_block, reset_code_enabled, system_role,system_admin_panel_access,system_member_suspend_power, system_member_suspend_power_needed, system_member_delete_power_needed, system_member_change_power_needed,name,system_member_change_power,system_member_add_power,system_role_id FROM member JOIN system_role on member.system_role = system_role.system_role_id and email=\"$myemail\"";
$res2 = mysqli_query($conn,$query2);
$my = mysqli_fetch_assoc($res2);
$his = mysqli_fetch_assoc($res1);
if ($my["system_admin_panel_access"]=="1"){
    if($my['system_member_change_power'] >= $his['system_member_change_power_needed']){
        //conatct_info_opt
        //permission check
        $custom_query = "SELECT system_role_id FROM system_role WHERE system_member_add_power_needed <= ".$my['system_member_add_power']." and system_role_id = ".$_POST['conatct_info_opt'];
        $custom_result = mysqli_query($conn,$custom_query);
        $custom_row = mysqli_fetch_assoc($custom_result);
        if (mysqli_num_rows($custom_result) == 1){
            $custom_query = "UPDATE member SET system_role = ".$_POST['conatct_info_opt']." where email = \"".$email."\"";
            $custom_result = mysqli_query($conn,$custom_query);
        }

        if (isset($_POST['chk_force_password_reset'])){
            if ($_POST['chk_force_password_reset']=="on"){
                $custom_query = "UPDATE member SET force_password_reset = 1 where email = \"".$email."\"";
                $custom_result = mysqli_query($conn,$custom_query);
            }
        }else{
            $custom_query = "UPDATE member SET force_password_reset = 0 where email = \"".$email."\"";
            $custom_result = mysqli_query($conn,$custom_query);
        }

        /*if($my['system_member_suspend_power'] >= $his['system_member_suspend_power_needed']){
            if(isset()){
                
            }
        }*/

        //chk_password_reset_block
        if (isset($_POST['chk_password_reset_block'])){
            if ($_POST['chk_password_reset_block']=="on"){
                $custom_query = "UPDATE member SET password_reset_block = \"".date('Y-m-d H:i:s')."\" where email = \"".$email."\"";
                $custom_result = mysqli_query($conn,$custom_query);
            }
        }else{
            $custom_query = "UPDATE member SET password_reset_block = \"1900-01-01 00:00:00\" where email = \"".$email."\"";
            $custom_result = mysqli_query($conn,$custom_query);
        }

        echo "success";



    }


}else{
    echo "0x01"; //no admin panel access
}

?>