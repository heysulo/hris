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
$codegenquery ="INSERT INTO member_info (member_id, category, field, value) SELECT member.member_id,temp_info.category,temp_info.field,temp_info.value from member join temp_info on temp_info.email = member.email and temp_info.email = \"$email\";DELETE FROM temp_info WHERE email=\"$email\";";
//$codegenquery ="INSERT INTO temp_info(email, category, field, value) VALUES (\"sulochana.456@live.com\",5,\"email\",\"allahuakabr\")";
$res = mysqli_multi_query($conn,$codegenquery);
if ($res){
    echo "success";
}else{
    echo mysqli_error($conn);
}