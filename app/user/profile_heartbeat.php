<?php
session_start();
$conn = null;
require_once("./config.conf");
require_once ("../database/database.php");
//$inc = '{"name":"sulochana","age":21}';
//$json_obj = json_decode($inc,true);
//print_r($json_obj);
//echo "<br/>".$json_obj["age"];
if (!isset($_SESSION['email']) or !isset($_REQUEST['id'])){
    die();
}
$id = htmlspecialchars($_REQUEST['id']);
$query1 = "SELECT * FROM member WHERE member_id=".$id." ";
$res1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($res1)){
    $row = mysqli_fetch_assoc($res1);
    $status = $row["availability_status"];
    $txt = $row["availability_text"];
    $lastseen = $row["last_login"];
    echo "{\"status\":\"$status\",\"text\":\"$txt\",\"lastseen\":\"$lastseen\"}";
}else{
    echo "error";
}
//echo date("hh:mm:ss");
?>