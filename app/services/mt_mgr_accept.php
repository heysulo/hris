<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 1/12/17
 * Time: 2:59 PM
 */

if (!isset($_POST['mid'])){
    echo "0x0E";
    die();
}
$conn = null;
require_once("config.conf");
require_once("../database/database.php");
if (!isset($_SESSION['user_id'])){
    require_once ("../templates/refresher.php");
}
//();
$mr_id = $_POST['mid'];
$updatequery = "SELECT * FROM meeting WHERE meeting_id=".$mr_id." AND target_id=".$_SESSION['user_id'];
$result = mysqli_query($conn,$updatequery);
$row = mysqli_fetch_assoc($result);
$target = $row['source_id'];
if (mysqli_num_rows($result)==1){
    $updatequery = "UPDATE meeting SET status=1 WHERE meeting_id=$mr_id;";
    $result = mysqli_query($conn,$updatequery);
    if ($result){
        $content = "<b>".$_SESSION['fname']." ".$_SESSION['lname']."</b> accepted your meeting request.";
        $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"ma_".$mr_id."\")";
        $res = mysqli_query($conn,$updatequery);
        echo "success";
    }else{
        echo "0x01";
    }

}else{
    echo "0x02";
}