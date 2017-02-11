<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("./config.conf");
require_once ("../database/database.php");
//$inc = '{"name":"sulochana","age":21}';
//$json_obj = json_decode($inc,true);
//print_r($json_obj);
//echo "<br/>".$json_obj["age"];

date_default_timezone_set('Asia/Colombo');
if (!isset($_SESSION['email']) or !isset($_REQUEST['id'])){
    die();
}
$id = htmlspecialchars($_REQUEST['id']);
$query1 = "SELECT * FROM member WHERE member_id=".$id." ";
$res1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($res1)){
    $row = mysqli_fetch_assoc($res1);
    $timeSecond  = strtotime(date("Y-m-d H:i:s"));
    $timeFirst= strtotime($row['last_login']);
    $differenceInSeconds = $timeSecond - $timeFirst;
    $status = $row["availability_status"];
    $txt = $row["availability_text"];
    $lastseen = "Last seen : ".smartdate($differenceInSeconds);
    echo "{\"status\":\"$status\",\"text\":\"$txt\",\"lastseen\":\"$lastseen\"}";
}else{
    echo "error";
}
function smartdate($timestamp) {
    $diff =  $timestamp;

    if ($diff <= 15) {
        return 'Now';
    }
    else if ($diff < 60) {
        return grammar_date(floor($diff), ' second(s) ago');
    }
    else if ($diff < 60*60) {
        return grammar_date(floor($diff/60), ' minute(s) ago');
    }
    else if ($diff < 60*60*24) {
        return grammar_date(floor($diff/(60*60)), ' hour(s) ago');
    }
    else if ($diff < 60*60*24*30) {
        return grammar_date(floor($diff/(60*60*24)), ' day(s) ago');
    }
    else if ($diff < 60*60*24*30*12) {
        return grammar_date(floor($diff/(60*60*24*30)), ' month(s) ago');
    }
    else {
        return grammar_date(floor($diff/(60*60*24*30*12)), ' year(s) ago');
    }
}


function grammar_date($val, $sentence) {
    if ($val > 1) {
        return $val.str_replace('(s)', 's', $sentence);
    } else {
        return $val.str_replace('(s)', '', $sentence);
    }
}
?>