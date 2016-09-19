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

    $qry = "DELETE FROM group_post WHERE group_id = '$gid' AND post_id = '$postId'";


    if($userValid == 000){
        echo false;
    }else{
        $res = mysqli_query($conn,$qry);
        if($res){
            echo true;
        }else{
            echo false;
        }
    }
}