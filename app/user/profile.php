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
<title>HRIS | My Profile</title>
</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <!--Content goes here...-->
    <div class="bottomPanel">
        <!--Content on top area-->
        <div class="profile_section_intro">
            <div class="profile_profile_image"></div>
            <div class="profile_name">
                <?php echo $fname." ".$lname?> <!--Print user name-->
                <button onclick="location.href='../editProfile/index.php';" class="edit_profile_button">Edit Profile</button>
            </div>
            <div class="profile_online_status_box">
                <div class="profile_availability_icon"></div>
                <div class="profile_availability_text">Available till 2.00 PM</div>
            </div>
            <div class="profile_last_seen_box">
                <div class="profile_last_seen_text">Last seen : 15 minutes ago</div>
            </div>
            <div class="profile_basic_summery">
                Role : Student<br>
                Academic Year : 2014/2015<br>
                Gender : Male<br>
            </div>
        </div>

        <div class="profile_section_main">
            <div class="profile_section_main_left">
                <?php include("contact_info.php") ?>
                <?php include("socities.php") ?>
                <?php include("languages.php") ?>
            </div>
            <div class="profile_section_main_right">

                <?php include("personal_info.php") ?>
                <?php include("about_me.php") ?>
                <?php include("interetst.php") ?>
            </div>

        </div>
    </div>


</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>