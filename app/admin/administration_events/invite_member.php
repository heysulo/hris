<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 9/18/16
 * Time: 8:50 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
require_once("../../templates/refresher.php");
$email = htmlspecialchars($_REQUEST['email']);
$role_id = htmlspecialchars($_REQUEST['role']);
if (isset($_SESSION["system_admin_panel_access"])){
    $query1 = "SELECT * FROM invitation WHERE email=\"".$email."\" ";
    $res1 = mysqli_query($conn,$query1);
    $query2 = "SELECT * FROM member WHERE email=\"".$email."\" ";
    $res2 = mysqli_query($conn,$query2);
    $query3 = "SELECT * FROM system_role WHERE system_role_id=$role_id";
    $res3 = mysqli_query($conn,$query3);
    if (mysqli_num_rows($res1) . mysqli_num_rows($res2) == "00"){
        if (mysqli_num_rows($res3) ==1){
            $row = mysqli_fetch_assoc($res3);
            if ($row['system_member_add_power_needed']<=$_SESSION['system_member_add_power']){
                $tokenx = bin2hex(openssl_random_pseudo_bytes(32));
                $query4 = "INSERT INTO invitation(email, system_role_id, token) VALUES (\"$email\",$role_id,\"".$tokenx."\")";
                $res4 = mysqli_query($conn,$query4);
                if ($res4){
                    echo "success_$tokenx";
                }else{
                    echo "0x5";
                }

            }else{
                echo "0x4";
            }
        }else{
            echo "0x3";
        }

    }else if (mysqli_num_rows($res1) . mysqli_num_rows($res2) == "01"){
        echo "0x1";
    }else if (mysqli_num_rows($res1) . mysqli_num_rows($res2) == "10"){
        echo "0x2";
    }else {
        echo "0xE";
    }
}else{
    echo "error";
}