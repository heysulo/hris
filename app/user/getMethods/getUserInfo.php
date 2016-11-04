<?php

$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['email']) && !isset($_POST['check'])) {

    header('location:../../index.php');

}else{
    $user_id = $_SESSION['user_id'];

    switch ($_POST['check']) {
        case 'get':
            //query to get availability data from database
            $qry = "SELECT current_city,home_town,religion,about,handler,joined_date,date_of_birth,email FROM member WHERE member_id ='$user_id'";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $qry));

            echo json_encode($res);
            break;

    }
}
