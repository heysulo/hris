<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    ?>

    <title>HRIS | Password Reset</title>
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<div class="welcome_top_gradient"></div>
<script>
    var step;
    step = 2;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include ("./template/steps.php"); ?>
    <?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        if (isset($_SESSION["pass"])){
            if ($_SESSION["pass"]==0){
                include ("./template/noaccountfound.php");
            }else{
                include ("./template/accountFound.php");
            }
        }else{
            header('Location:'. "password_reset.php");
        }
    ?>
    

</div>



</body>


