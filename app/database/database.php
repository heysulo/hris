<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 8/15/16
 * Time: 10:03 PM
 */

$conn = mysqli_connect($host,$username,$password,$database);

if(!$conn){
    header("location:../../error.php?error=Can't connect to database.");
}