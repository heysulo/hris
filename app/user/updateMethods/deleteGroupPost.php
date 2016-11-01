<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/2/16
 * Time: 4:59 PM
 */

$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
session_start();

if (!isset($_SESSION['email']) and !isset($_GET['group']) and !isset($_GET['i'])){
    header("location:../groups.php");
}else{
    $gid = $_GET['group'];
    $userValid = $_GET['p'];
    $postId = $_GET['i'];
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