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

                    <!--Content info add from here-->
                    <div class="society_item">
                        <div class="society_item_club">Society : Gavel Club University of Colombo</div>
                        <div class="society_item_role">My Role : Super Long President</div>
                        <br>
                        <div class="society_item_extra">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                            Nulla consequat massa quis enim.
                        </div>
                    </div>
                    <hr>

                    <!--Content info add from here-->
                    <div class="society_item">
                        <div class="society_item_club">Society : Gavel Club University of Colombo</div>
                        <div class="society_item_role">My Role : Super Long President</div>
                        <br>
                        <div class="society_item_extra">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                            Nulla consequat massa quis enim.
                        </div>
                    </div>
                    <hr>
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
                        echo "<div class='skill_item language_item'>
	                                $str
                              </div>";
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
                    <!--Personal info content goes here.-->
                    <div class="contact_info_item">
                        <div class="contact_info_item_field">School :</div>
                        <div class="contact_info_item_value">St. Aloysius' College, Galle</div>
                    </div>

                </div>

                <!--About me data area-->
                <div class="dbox profile_section_aboutme">
                    <div class="dboxheader dbox_head_profile_aboutme">
                        <div class="dboxtitle botmarg">
                            About Me
                        </div>
                        <p>     Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                            Nulla consequat massa quis enim.
                            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                            In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                            Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
                            Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
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
                            echo "<div class='skill_item'>
                                    $str
                                  </div>";
                        }
                        ?>

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