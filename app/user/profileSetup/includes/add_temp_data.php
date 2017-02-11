<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 9/19/16
 * Time: 8:59 AM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../../config.conf");
require_once ("../../../database/database.php");
$email = $_REQUEST['email'];
$cat = $_REQUEST['cat'];
$field = $_REQUEST['field'];
$value = $_REQUEST['value'];
$codegenquery ="INSERT INTO temp_info(email, category, field, value) VALUES (\"$email\",$cat,\"$field\",\"$value\")";
//$codegenquery ="INSERT INTO temp_info(email, category, field, value) VALUES (\"sulochana.456@live.com\",5,\"email\",\"allahuakabr\")";
$res = mysqli_query($conn,$codegenquery);
if ($res){
    echo "success";
}else{
    echo mysqli_error($conn);
}