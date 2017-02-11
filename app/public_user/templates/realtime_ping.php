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
    echo json_encode($row);
?>