<?php
    include_once ("path.php");
    defined('hris_access') or die(header("location:../../error.php"));
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];
?>
<div class="panelTop">
        <div class="divadjustment">
            <div class="top_dropdown_click">
                <div class="topbox_account_settings" id="setting"></div>
                <div class="top_dropdown_content_click" id="dropdown">
                        <a href="#">Account Settings</a>
                        <a href="logout.php">Logout</a>
                        <a href="#">Go Offline</a>

                </div>
            </div>

            <!--User detail showing bar-->
            <div class="topprofilecontent">
                <div class=""><img class="topprofilepicture" src=" <?php echo "$imagePath/pro_pic/$pro_pic"; ?> " alt=""></div>
                <div class="topbox_profile_name"> <?php echo "$fname $lname"?></div>
                <div class="topbox_profile_role"><?php echo "$type"?></div>
            </div>

        </div>
</div>
<div id="msgbox_responder"></div>