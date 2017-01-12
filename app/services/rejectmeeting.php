<?php
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

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

$conn = null;
require_once("config.conf");
require_once("../database/database.php");
if (!isset($_SESSION['user_id'])){
    require_once ("../templates/refresher.php");
}
$query2 = "SELECT * FROM notification WHERE member_id= ".$_SESSION['user_id']." and nid=".$_REQUEST['nid'];
$result = mysqli_query($conn,$query2);
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $mr_id = $row['action'];
    $query2 = "UPDATE notification SET seen=1 WHERE nid=".$_REQUEST['nid'];
    $result = mysqli_query($conn,$query2);
    if ($result && startsWith($mr_id,"mr_")){
        $mr_id = substr($mr_id, 3);
        $updatequery = "SELECT * FROM meeting WHERE meeting_id=".$mr_id." AND target_id=".$_SESSION['user_id'];
        $result = mysqli_query($conn,$updatequery);
        $row = mysqli_fetch_assoc($result);
        $target = $row['source_id'];
        if (mysqli_num_rows($result)==1){
            $updatequery = "UPDATE meeting SET status=2 WHERE meeting_id=$mr_id;";
            $result = mysqli_query($conn,$updatequery);
            if ($result){
                $content = "<b>".$_SESSION['fname']." ".$_SESSION['lname']."</b> rejected your meeting request.";
                $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"md_".$mr_id."\")";
                $res = mysqli_query($conn,$updatequery);
                echo "success";
            }else{
                echo "0x01";
            }

        }else{
            echo "0x02";
        }

    }elseif($result && startsWith($mr_id,"mc_")){
        $mr_id = substr($mr_id, 3);
        $updatequery = "SELECT * FROM meeting WHERE meeting_id=".$mr_id;
        $result = mysqli_query($conn,$updatequery);
        $row = mysqli_fetch_assoc($result);
        $bounce = false;
        if($row['source_id']==$_SESSION['user_id']){
            $bounce = true;
            $target = $row['target_id'];
        }else{
            $bounce = false;
            $target = $row['source_id'];
        }
        if (mysqli_num_rows($result)==1){
            $updatequery = "UPDATE meeting SET status=2 WHERE meeting_id=$mr_id;";
            $result = mysqli_query($conn,$updatequery);
            if ($result){
                if($bounce){
                    $content = "<b>".$_SESSION['fname']." ".$_SESSION['lname']."</b> canceled the meeting with you.";
                    $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"ma_".$mr_id."\")";
                    $res = mysqli_query($conn,$updatequery);
                }else{
                    $updatequery = "SELECT member.* FROM member join meeting on member_id=source_id and meeting_id=$mr_id";
                    $result = mysqli_query($conn,$updatequery);
                    $row = mysqli_fetch_assoc($result);
                    $content = "<b>".$row['first_name']." ".$row['last_name']."</b> canceled the meeting with you.";
                    $updatequery = "INSERT INTO notification(member_id, message, unshown, seen, action) VALUES ($target, \"$content\",1,0,\"ma_".$mr_id."\")";
                    $res = mysqli_query($conn,$updatequery);
                }
                echo "success";
            }else{
                echo "0x01";
            }

        }else{
            echo "0x02";
        }

    }else{
        echo "0x03";
    }
}else{
    echo "0x04";
}