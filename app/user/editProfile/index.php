<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

//    if (!isset($_SESSION['email'])){
//        header("location:../../index.php");
//    }

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];

    ?>
    <title>HRIS | Edit Profile</title>
</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../../templates/navigation_panel.php'); ?>
    <?php include_once('../../templates/top_pane.php'); ?>
    <?php include_once('templates/bottom_panel.php'); ?>
    <div class="bottomPanel" style="height: 100%;"></div>
</div>

<?php
include_once('../../templates/_footer.php');
?>
</body>
</html>