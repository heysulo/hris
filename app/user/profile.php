<!DOCTYPE html>
<html>
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
        $pro_pic= $_SESSION['pro_pic'];
        $category = $_SESSION['category'];
        $aca_year = $_SESSION['aca_year'];
        $gender = $_SESSION['gender'];
        $lastLogin = $_SESSION['last_login'];

        $pro_picture = $pro_pic != "" ? $pro_pic : "defimg.jpg";

        $lastLoginData = explode(" ",$lastLogin);

    ?>
<title>HRIS | My Profile</title>
</head>
<body>
<div>
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <!--Content goes here...-->
    <div class="bottomPanel">
        <!--Content on top area-->
        <div class="profile_section_intro">

            <img class="profile_profile_image" src="<?php echo "$imagePath/pro_pic/$pro_picture"; ?>" alt="">

            <div class="profile_name">
                <?php echo $fname." ".$lname?> <!--Print user name-->
                <button onclick="location.href='./editProfile/index.php';" class="edit_profile_button">Edit Profile</button>
            </div>

            <!--Availability status area-->
            <div class="profile_online_status_box">
                <div class="profile_availability_icon"></div>
                <div class="profile_availability_text"></div>
                <div class="profile_availability_text_2"></div>
            </div>

            <!--last seen data area-->
            <div class="profile_last_seen_box">
                <div class="profile_last_seen_text">Last seen : <?php echo $lastLoginData[0]." at ".$lastLoginData[1]; ?> <!--15 minutes ago--></div>
            </div>

            <!--Profile basic data area-->
            <div class="profile_basic_summery">
                Role : <?php echo $category?><br>
                <?php if($aca_year != 0000){ echo "Academic Year : $aca_year"; } ?><br>
                Gender : <?php echo $gender ?><br>
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

                </div>

                <!--Societies related works shows.-->
                <div class="dbox profile_section_socities">
                    <div class="dboxheader dbox_head_profile_socities">
                        <div class="dboxtitle botmarg">
                            Roles in Clubs and Socities
                        </div>
                    </div>

                    <!--Content info add from here-->
                    <div class="society_item">
                        <div class="society_item_club">Gavel Club University of Colombo</div><div class="society_item_role">Member</div>
                        <div class="society_item_extra">
                            The University of Colombo Gavel Club is affiliated to Toastmasters International USA and was chartered in October 2014. The main objectives of the club are to develop communication, presentation and leadership skills among the undergraduates. Our educational meetings are held on Mondays from 4pm to 6pm at the NPLT (New Physics Lecture Theatre), Department of Physics, Faculty of Science University of Colombos

                        </div>
                    </div>

                </div>

                <!--Skilled programming technology-->
                <div class="dbox profile_section_languages">
                    <div class="dboxheader dbox_head_profile_languages">
                        <div class="dboxtitle botmarg">
                            Compatible Languages
                        </div>
                    </div>
                    <div>
                        <div class='skill_item language_item'>
                            Java
                        </div>
                        <div class='skill_item language_item'>
                            PHP
                        </div>
                        <div class='skill_item language_item'>
                            Python
                        </div>
                        <div class='skill_item language_item'>
                            MYSQL
                        </div>
                        <div class='skill_item language_item'>
                            AngularJS
                        </div>
                        <div class='skill_item language_item'>
                            Graphic Designing
                        </div><div class='skill_item language_item'>
                            Networking
                        </div>

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
                    <!--Personal info content goes here.-->
                    <div class="contact_info_item" id="current_city">
                        <div class="contact_info_item_field">Current City</div>
                        <div class="contact_info_item_value"></div>
                    </div>
                    <div class="contact_info_item" id="home_town">
                        <div class="contact_info_item_field">Hometown</div>
                        <div class="contact_info_item_value"></div>
                    </div>
                    <div class="contact_info_item" id="religion">
                        <div class="contact_info_item_field">Religion</div>
                        <div class="contact_info_item_value"></div>
                    </div>
                    <!--<div class="contact_info_item" id="">
                        <div class="contact_info_item_field">School :</div>
                        <div class="contact_info_item_value">St. Aloysius' College, Galle</div>
                    </div>-->

                </div>

                <!--About me data area-->
                <div class="dbox profile_section_aboutme">
                    <div class="dboxheader dbox_head_profile_aboutme">
                        <div class="dboxtitle botmarg">
                            About Me
                        </div>
                        <p id="about_me"></p>
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
                        <div class='skill_item'>
                            Climbing
                        </div>
                        <div class='skill_item'>
                            Reading
                        </div>
                        <div class='skill_item'>
                            PLaying Video Games
                        </div>
                        <div class='skill_item'>
                            Coding
                        </div>
                        <div class='skill_item'>
                            Creative Writing
                        </div><div class='skill_item'>
                            Singing
                        </div><div class='skill_item'>
                            Swimming
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<?php
include_once('../templates/_footer.php');
?>

<script>
    $(document).ready(function () {
        //Update availability status
        $.ajax({
            type:"POST",
            url:"getMethods/getAvailabilityStatus.php",
            data:{'check':'get'},
            dataType:"json",
            success:function (response) {
                //availability status updates...
                var res = response['availability_status'];
                var val = res.split('_');
                var value = val[0];
                var col = val[1];
                $('.profile_availability_text').html(value);
                $('.profile_availability_icon').css('background-color',col);
                $('.profile_profile_image').css('box-shadow','0px 0px 8px 2px'+col);

                //availability text update...
                var text_res = response['availability_text'];
                $('.profile_availability_text_2').html(text_res);
            }
        });

        //Update user information.
        $.ajax({
            type:"POST",
            url:"getMethods/getUserInfo.php",
            data:{'check':'get'},
            dataType:"json",
            success:function (info) {
                console.log(info);

                //Personal info content
                var curr_city = info['current_city'];
                if (curr_city == null){
                    $('#current_city').css('display','none');
                }else{
                    $('#current_city > .contact_info_item_value').html(' : '+curr_city);
                }

                var home_town = info['home_town'];
                if (home_town == null){
                    $('#home_town').css('display','none');
                }else{
                    $('#home_town > .contact_info_item_value').html(' : '+home_town);
                }

                var religion = info['religion'];
                if (home_town == null){
                    $('#religion').css('display','none');
                }else{
                    $('#religion > .contact_info_item_value').html(' : '+religion);
                }

                var about= info['about'];
                if (about == null){
                    $('#about_me').css('display','none');
                }else{
                    $('#about_me').html(about);
                }

                var emailAddr = info['email'];
                

            }
        })


    });
</script>
</body>
</html>