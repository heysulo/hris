<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    $conn = null;
    require_once("../config.conf");
    require_once ("../../database/database.php");
    ?>

    <title>HRIS | Password Reset</title>
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<div class="welcome_top_gradient"></div>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["block"])){
        header('Location:'. "password_reset.php");
    }
    $fname = $_SESSION['fname'];
    $mname = $_SESSION['mname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];

    $query = "SELECT * FROM member WHERE email='$email'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);

    function getfullname(){
        global $fname,$lname;
        $full =  $fname . " " . $lname;
        return $full;
    }
    session_destroy();
    ?>

    <div class="resetpassword_errorbox_accountnotfound">
        <p>The following account has being locked by the system due some security issues. You may retry resetting the password after sometime.</p>
    </div>
    <br>
    <div class="resetpassword_account_box">
        <img class="resetpassword_account_propic" src="../../images/pro_pic/<?php echo $row['profile_picture'];?>"
        <div>
            <span class="resetpassword_account_name"><?php echo getfullname();?></span>
            <br>
            <span class="resetpassword_account_role">Member of UCSC<br><?= $email;?></span>
        </div>
        <!--    <div class="resetpassword_account_name">Allah Huakbar</div>-->
        <!--    <br>-->
        <!--    <div class="resetpassword_account_role">sulochana.456@live.com</div>-->
    </div>
    <div style="text-align: center;clear: both;">
        <br>
    </div>

    

</div>



</body>


