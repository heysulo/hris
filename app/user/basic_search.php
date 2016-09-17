<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    session_start();

    if (!isset($_SESSION['email'])){
        header("location:../../index.php");
    }

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];
    $user_id = $_SESSION['user_id'];
    $availability_status = $_SESSION['availability_status'];
    $availability_text = $_SESSION['availability_text'];

    ?>
    <title>HRIS | Dashboard</title>
</head>
<body>
<!--Top pane and Navigation pane added here-->
<div>
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
</div>

<!--Other content goes here-->
<div class="bottomPanel">


</div>


<?php
include_once('../templates/_footer.php');
?>

</body>
</html>
