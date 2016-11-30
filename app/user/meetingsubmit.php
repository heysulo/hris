<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/29/16
 * Time: 5:57 PM
 */
function validateDate($datex, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $datex);
    return ($d && $d->format($format) == $datex);
}

function validateTime($datex, $format = 'g:i A')
{
    $d = DateTime::createFromFormat($format, $datex);
    return ($d && $d->format($format) == $datex);
}

function passedevent($datex){
    return (time() - strtotime($datex))>0;
}

$conn = null;
require_once("./config.conf");
require_once("../database/database.php");
require_once("../templates/refresher.php");
$target = $_POST['target'];
$query2 = "SELECT * FROM member join system_role on member.system_role = system_role.system_role_id and member.member_id='$target' ";
$result = mysqli_query($conn,$query2);
$row = mysqli_fetch_assoc($result);

$date = mysqli_real_escape_string($conn,$_POST['date']);
$time = strtoupper(mysqli_real_escape_string($conn,$_POST['time']));

if ($_SESSION['system_meeting_request_power'] < $row['system_meeting_request_power_needed']){
    echo "0x01"; //no permission
    die();
}

if ($_SESSION['email'] == $row['email']){
    echo "0x02"; //request yourself ?
    die();
}

if(!validateDate($date, 'Y-m-d')){
    echo "0x03"; //invalid date
    die();
}

if(!validateTime($time)){
    echo "0x04"; //invalid time
    die();
}

if(passedevent($date." ".$time)){
    echo "0x05"; //not in the future
    die();
}


$summary = mysqli_real_escape_string($conn,$_POST['subject']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$updatequery = "INSERT INTO meeting(source_id, target_id, subject, description, date, time, status) VALUES (".$_SESSION['user_id'].",".$row['member_id'].",\"$summary\",\"$description\",\"$date\",\"$time\",0)";
$res = mysqli_query($conn,$updatequery);
if ($res){
    $content = "<b>".$_SESSION['fname']." ".$_SESSION['lname']."</b> requested a meeting with you on $date at $time. This is regarding $summary.";
    $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"mr_".$conn->insert_id."\")";
    $res = mysqli_query($conn,$updatequery);
    echo "success";
}else{
    echo "0x06"; //sqlerror
}

