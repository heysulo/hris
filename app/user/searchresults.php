<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 1/14/17
 * Time: 11:03 AM
 */

print_r($_REQUEST);

$_REQUEST =  array_map('strtolower', $_REQUEST);

$cs = "select * from member where 1=1 ";
$meminfo = "select * from member_info where 1=1 ";

//name***********************************
if (isset($_REQUEST['fname']) && $_REQUEST['fname'] !="" ){
    $cs = $cs."and first_name LIKE '%".addslashes($_REQUEST['fname'])."%'";
}

if (isset($_REQUEST['mname']) && $_REQUEST['mname'] !="" ){
    $cs = $cs." and middle_name LIKE '%".addslashes($_REQUEST['mname'])."%'";
}

if (isset($_REQUEST['lname']) && $_REQUEST['lname'] !="" ){
    $cs = $cs." and last_name LIKE '%".addslashes($_REQUEST['lname'])."%'";
}

//dob*************************************

if (isset($_REQUEST['dob_y']) && $_REQUEST['dob_y'] !="" ){
    $cs = $cs." and year(date_of_birth) = ".addslashes($_REQUEST['dob_y']);
}

if (isset($_REQUEST['dob_m']) && $_REQUEST['dob_m'] !="" ){
    $cs = $cs." and month(date_of_birth) = ".addslashes($_REQUEST['dob_m']);
}


if (isset($_REQUEST['dob_d']) && $_REQUEST['dob_d'] !="" ){
    $cs = $cs." and day(date_of_birth) = ".addslashes($_REQUEST['dob_d']);
}

if (isset($_REQUEST['gender'])){
    switch ($_REQUEST['gender']){
        case "male":
            $cs = $cs." and gender = \"Male\"";
            break;
        case "female":
            $cs = $cs." and gender = \"Female\"";
            break;
    }
}

//location****************************
if (isset($_REQUEST['hometown']) && $_REQUEST['hometown'] !=-1){
    $cs = $cs." and home_town LIKE '%".addslashes($_REQUEST['hometown'])."%'";
}

if (isset($_REQUEST['currentcity']) && $_REQUEST['currentcity'] !=-1){
    $cs = $cs." and current_city LIKE '%".addslashes($_REQUEST['currentcity'])."%'";
}

echo "<br><br><br>";
echo $cs;

// month(date_of_birth) = 1