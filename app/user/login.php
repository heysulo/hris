<?php
if(isset($_POST['loginBtn'])){
    header("location:user_home.php");
}else if(isset($_POST['publicUserBtn'])){
    header('location:public.php');
    header("location:public_home.php");
}else{
    header("location:../../index.php");
}
?>
