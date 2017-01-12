
<?php

defined('hris_access') or die(header("location:../../error.php"));

define("hris_access",true);
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");

//query to check index number and registration number data from database
$qry = "SELECT * FROM batch WHERE reg_num = '$reg_num' AND index_num='$index_num'";
$res = mysqli_query($conn,$qry);

if ($res){
    echo json_encode(1);
}else{
    echo json_encode(0);
}
