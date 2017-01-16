<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 8/15/16
 * Time: 10:03 PM
 */

if ($_SERVER['HTTP_HOST'] == 'hrisucsc.azurewebsites.net'){
    $conn = mysqli_connect($host,$username,$password,$database);
}else{
    $conn = mysqli_connect($_host,$_username,$_password,$_database);

}


if(!$conn){
    header("location:../../error.php?error=Can't connect to database.");
}