<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/18/16
 * Time: 8:06 PM
 */

$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
session_start();

if (!isset($_SESSION['email']) and !isset($_POST['group']) and !isset($_POST['user'])){
    header("location:../groups.php");
}else{
    $gid = $_POST['group'];
    $user_id = $_POST['user'];

    //Insert user data and group data into group member request table
    $qry = "INSERT INTO group_member_request(group_id,member_id) VALUES ('$gid','$user_id')";

    $res = mysqli_query($conn,$qry);
    if($res){
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }
}