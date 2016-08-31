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
            <!--Left side-->
            <div class="profile_section_main_left">
                <!--Contact info display-->
                <div class="dbox profile_section_contactinfo">
                    <div class="dboxheader dbox_head_profilecontactinfo">
                        <div class="dboxtitle botmarg">
                            Contact Information
                        </div>

                    </div>
                    <!--Contact  info content goes here..-->
                    <div class="contact_info_item">
                        <div class="contact_info_item_field">Email :</div>
                        <div class="contact_info_item_value"><?php echo $email ?></div>
                    </div>
                    <div class="contact_info_item">
                        <div class="contact_info_item_field">Email :</div>
                        <div class="contact_info_item_value"><?php echo $email ?></div>
                    </div>
                    <div class="contact_info_item">
                        <div class="contact_info_item_field">Email :</div>
                        <div class="contact_info_item_value"><?php echo $email ?></div>
                    </div>

                </div>

                <!--Societies related works shows.-->
                <div class="dbox profile_section_socities">
                    <div class="dboxheader dbox_head_profile_socities">
                        <div class="dboxtitle botmarg">
                            Roles in Clubs and Socities
                        </div>
                    </div>
                    <?php include("socity_item.php") ?>
                    <?php include("socity_item.php") ?>
                    <?php include("socity_item.php") ?>
                    <?php include("socity_item.php") ?>
                    <?php include("socity_item.php") ?>
                </div>

                <!--Skilled programming technology-->
                <div class="dbox profile_section_languages">
                    <div class="dboxheader dbox_head_profile_languages">
                        <div class="dboxtitle botmarg">
                            Compatible Languages
                        </div>
                    </div>
                    <div>
                        <?php
                        $str =  "Af-Soomaali,Afrikaans,Azərbaycan dili,Bahasa Indonesia,Bahasa Melayu,Basa Jawa,Bisaya,Bosanski,Brezhoneg";
                        $ary = explode(',', $str);
                        foreach($ary as $str){
                            include("language_item.php");
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--Right side-->
            <div class="profile_section_main_right">

                <!--Shared personal info area-->
                <div class="dbox profile_section_personal">
                    <div class="dboxheader dbox_head_profile_personal">
                        <div class="dboxtitle botmarg">
                            Shared Information
                        </div>

                    </div>
                    <?php include("personal_info_item.php") ?>
                    <?php include("personal_info_item.php") ?>
                    <?php include("personal_info_item.php") ?>
                    <?php include("personal_info_item.php") ?>

                </div>

                <!--About me data area-->
                <div class="dbox profile_section_aboutme">
                    <div class="dboxheader dbox_head_profile_aboutme">
                        <div class="dboxtitle botmarg">
                            About Me
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
                    </div>
                </div>

                <!--Show user interests in here-->
                <div class="dbox profile_section_interests">
                    <div class="dboxheader dbox_head_profile_interetst">
                        <div class="dboxtitle botmarg">
                            Skills & Intrests
                        </div>
                    </div>
                    <div>
                        <?php
                        $str =  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.";
                        $ary = explode(' ', $str);
                        foreach($ary as $str){
                            include("skill_item.php");
                        }
                        ?>

                        <?php include("skill_item.php") ?>
                        <?php include("skill_item.php") ?>
                        <?php include("skill_item.php") ?>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>