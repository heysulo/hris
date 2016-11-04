<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $conn = null;
    $email = $_SESSION['email'];
    date_default_timezone_set('Asia/Colombo');
    require_once("../user/config.conf");
    require_once ("../database/database.php");

    $qry = "SELECT last_login FROM member WHERE email ='$email'";
    $res = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($res);
    //$ll = DateTime("Y-m-d H:i:s",strtotime($row['last_login']));
    //$diff = DateTime("Y-m-d H:i:s").diff($ll);
    //echo $diff.format('%R%a days');
    $timeSecond  = strtotime(date("Y-m-d H:i:s"));
    $timeFirst= strtotime($row['last_login']);
    $differenceInSeconds = $timeSecond - $timeFirst;
    //echo $differenceInSeconds;/'/
    echo smartdate($differenceInSeconds);



    function smartdate($timestamp) {
        $diff =  $timestamp;

        if ($diff <= 0) {
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