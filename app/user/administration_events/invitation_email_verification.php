<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once ("../../database/database.php");
$email = htmlspecialchars($_REQUEST['email']);
if (isset($_SESSION["system_admin_panel_access"])){
    $query1 = "SELECT * FROM invitation WHERE email=\"".$email."\" ";
    $res1 = mysqli_query($conn,$query1);

    $query2 = "SELECT * FROM member WHERE email=\"".$email."\" ";
    $res2 = mysqli_query($conn,$query2);
    echo mysqli_num_rows($res1) . mysqli_num_rows($res2);
}else{
    echo "error";
}