<!DOCTYPE html>
<head>
    <?php
    define(hris_access,true);
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

    ?>
    <title>HRIS | Groups</title>
</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
    <?php //include_once('../templates/bottom_panel.php'); ?>

    <div class="bottomPanel">
        <form action="" method="post">
            <input type="text" name="g_name">
            <input type="text" name="g_description">
            <input type="text" name="g_category">
            <input type="file" name="g_logo">
            <input type="color" name="g_color">
            <input type="submit" value="Create Group">
        </form>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>
