
<?php

//defined('hris_access') or die(header("location:../../../error.php"));

define("hris_access",true);
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");

$index_num = mysqli_escape_string($conn,$_POST['index']);
$reg_num = mysqli_escape_string($conn,$_POST['reg']);
$batch = mysqli_escape_string($conn,$_POST['batch']);

//query to check index number and registration number data from database
$qry = "SELECT * FROM $batch WHERE reg_num = '$reg_num' AND index_num='$index_num'";
$res = mysqli_query($conn,$qry);
$row = mysqli_fetch_assoc($res);
$acc = $row['account'];
if ($acc == "1"){
    echo 1;
}else if($acc == '0'){
    echo 0;
}else{
    echo 'null';
}



?>