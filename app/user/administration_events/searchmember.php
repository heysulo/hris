<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once ("../../database/database.php");
$email = htmlspecialchars($_REQUEST['email']);
if (isset($_SESSION["system_admin_panel_access"])){
    $query1 = "SELECT email, first_name, middle_name, last_name, category, course, profile_picture, force_password_reset, password_reset_block, reset_code_enabled, system_role FROM member JOIN system_role on member.system_role = system_role.system_role_id and email=\"$email\"";
    $res1 = mysqli_query($conn,$query1);
    if (mysqli_num_rows($res1)==1){
        echo json_encode(mysqli_fetch_assoc($res1));
    }else{
        echo "0";
    }
}else{
    echo "error";
}