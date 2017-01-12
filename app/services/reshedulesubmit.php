<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/29/16
 * Time: 5:57 PM
 */

/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 12/1/16
 * Time: 1:52 AM
 *
 * 0 = sent for approval
 * 1 = approved
 * 2 = rejected
 * 3 = resheduled
 * 4 = cancel
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
$mid = $_POST['nid'];
$query2 = "SELECT * FROM meeting where meeting_id=$mid";
$result = mysqli_query($conn,$query2);
$row = mysqli_fetch_assoc($result);
$bounce = false;
if($row['source_id']==$_SESSION['user_id']){
    $bounce = true;
    $target = $row['target_id'];
}else{
    $bounce = false;
    $target = $row['source_id'];
}

//$target = $row['source_id'];
$date = mysqli_real_escape_string($conn,$_POST['date']);
$time = strtoupper(mysqli_real_escape_string($conn,$_POST['time']));


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


$updatequery = "UPDATE meeting SET date=\"$date\",time=\"$time\",status=3 WHERE meeting_id=$mid";
$res = mysqli_query($conn,$updatequery);
if ($res){
    if($bounce){
        $content = "<b>".$_SESSION['fname']." ".$_SESSION['lname']."</b> resheduled the meeting with you to <b>$date</b> at <b>$time</b>.";
        $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"mc_".$mid."\")";
        $res = mysqli_query($conn,$updatequery);
    }else{
        $updatequery = "SELECT member.* FROM member join meeting on member_id=source_id and meeting_id=$mid";
        $result = mysqli_query($conn,$updatequery);
        $row = mysqli_fetch_assoc($result);

        $content = "<b>".$row['first_name']." ".$row['last_name']."</b> resheduled the meeting with you to <b>$date</b> at <b>$time</b>.";
        $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"mc_".$mid."\")";
        $res = mysqli_query($conn,$updatequery);
    }

    echo "success";
}else{
    echo "0x06"; //sqlerror
}

