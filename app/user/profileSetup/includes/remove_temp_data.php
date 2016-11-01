<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 9/19/16
 * Time: 8:59 AM
 */
session_start();
$conn = null;
require_once("../../config.conf");
require_once ("../../../database/database.php");
$email = $_REQUEST['email'];
$codegenquery ="DELETE FROM temp_info WHERE email=\"$email\" ";
//$codegenquery ="INSERT INTO temp_info(email, category, field, value) VALUES (\"sulochana.456@live.com\",5,\"email\",\"allahuakabr\")";
$res = mysqli_query($conn,$codegenquery);
if ($res){
    echo "success";
}else{
    echo mysqli_error($conn);
}