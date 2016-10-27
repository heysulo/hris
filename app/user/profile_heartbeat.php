<?php
session_start();
$conn = null;
require_once("../config.conf");
require_once ("../../database/database.php");
$id = htmlspecialchars($_REQUEST['id']);
$query1 = "SELECT * FROM member WHERE id=\"".$id."\" ";
//    $res1 = mysqli_query($conn,$query1);
//
//    $query2 = "SELECT * FROM member WHERE email=\"".$email."\" ";
//    $res2 = mysqli_query($conn,$query2);
//    echo mysqli_num_rows($res1) . mysqli_num_rows($res2);
//}else{
//    echo "error";
//}

echo date("hh:mm:ss");
?>