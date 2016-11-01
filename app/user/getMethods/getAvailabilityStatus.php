<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/11/16
 * Time: 12:49 PM
 */

$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
session_start();

if(!isset($_SESSION['email']) && !isset($_POST['check'])) {

    header('location:../../index.php');

}else{
    $user_id = $_SESSION['user_id'];

    switch ($_POST['check']){
        case 'get':
            //query to get availability data from database
            $qry = "SELECT availability_status , availability_text FROM member WHERE member_id ='$user_id'";
            $res = mysqli_fetch_assoc(mysqli_query($conn,$qry));

            echo json_encode($res);
            break;

        case 'set':
            $msg = mysqli_real_escape_string($conn,$_POST['msg']);
            $msg = explode("_",$msg);
            
            //query to submit availability status
            $qry = "UPDATE member SET availability_status='$msg[0]' WHERE member_id='$user_id'";
            if (mysqli_query($conn,$qry)){
                echo 1;
            }else{
                echo 0;
            }
            break;

        case 'text_set':
            $msg = mysqli_real_escape_string($conn,$_POST['msg']);
            //query to submit availability text
            $qry = "UPDATE member SET availability_text='$msg' WHERE member_id='$user_id'";
            if (mysqli_query($conn,$qry)){
                echo 1;
            }else{
                echo 0;
            }
            break;
    }

}
