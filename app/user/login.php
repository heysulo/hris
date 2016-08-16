<?php

include_once ("config.php");
include_once ("../database/database.php");
session_start();


if(isset($_POST['loginbtn'])){
    loginUser();
}else{
    header("location:../../index.php");
}

function loginUser(){
    if (isset($_POST['email']) && isset($_POST['password'])){
        echo "Welcome to the palace";
    }
}

?>
