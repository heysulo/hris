<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = "";
    require_once("config.conf");
    require_once ("../database/database.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

   /* if (!isset($_SESSION['email'])){
        header("location:../../index.php");
    }*/

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];

    if (isset($_POST['addUser'])){

        $tmp_email = mysqli_real_escape_string($conn,$_POST['user_email']);
        $encoded_email = base64_encode($tmp_email);
        $category = mysqli_real_escape_string($conn,$_POST['category']);

        $link = "http://localhost/hris/app/user/profileSetup/setupProfile.php?em='$encoded_email'";

        $to = $tmp_email;
        $subject = "Setup HRIS profile";
        $txt = "Welcome to UCSC Human Resource Information System. Please use this link to setup your new profile. $link ";
        $headers = "From: ucschris@example.com";
        // mail($to,$subject,$txt,$headers);
        // Create new tab..
        echo "<a target='_blank' href='email.tmp..php?li=$encoded_email'> View new user mail address. </a>";

    }

    ?>
    <title>HRIS | Administrator</title>

    <style>
        input{
            font-size: .9em;
        }
        select{
            font-size: .9em;
        }
    </style>
</head>
<body>
<div class="panelSide">
    <center>
        <img class="ucsclogo" src="<?php echo $publicPath?>img/ucsc_logo_white.png">
        <p class="hrsititle">Human Resource Information System</p>
    </center>
    <ul class="navbar" id="navbar"></ul>
</div>

<?php include_once('../templates/top_pane.php'); ?>
<div class="clearfix"  style="padding: 0px;">
        <div class="bottomPanel">
        <div style="float:left;height:80px;width:100%;">
            <div style="float:left;width:auto;height:100%;">
                <div class="txt_paneltitle">System Administration</div>
            </div>
        </div>

        <div class="admin_main_content_area">

            <div class="admin_main_content">
                <div class="dbox dbox_management">
                    <div class="dboxheader dbox_head_member_management">
                        <div class="dboxtitle">
                            Member Management
                        </div>
                        <div style="width:100%;height:auto;">
                            <ul class="admin_member_management_navbar">
                                <li id="admin_memeber_manage_navbar_list_item_1" class="admin_member_management_navbar_item admin_member_management_navbar_item_active" onclick="activate_tab(1);">Add</li>
                                <li id="admin_memeber_manage_navbar_list_item_2" class="admin_member_management_navbar_item" onclick="activate_tab(2);">Suspend</li>
                                <li id="admin_memeber_manage_navbar_list_item_3" class="admin_member_management_navbar_item" onclick="activate_tab(3);">Delete</li>
                                <li id="admin_memeber_manage_navbar_list_item_4" class="admin_member_management_navbar_item" onclick="activate_tab(4);">Manage</li>
                            </ul>
                        </div>

                        <!--Member management area content-->
                        <div class="admin_member_management_content">

                            <!--Add member area-->
                            <form action="" method="post">
                                <div id="member_management_panel_add">
                                    <p class="admin_member_management_help_text">
                                        Enter the email address and the system role of the new user.
                                        The system will send an invite link which will help the new user to setup his account
                                    </p>
                                    <input id="input_shared_info" name="user_email" class="admin_new_member_email" placeholder="New User's Email Address" type="email" required>
                                    <p class="admin_member_management_help_text">
                                        Select the user's role inside the system
                                    </p>
                                    <select id="conatct_info_opt" name="category" class="admin_new_member_role_select" required>
                                        <option value="">-- select --</option>
                                        <option value='Student'>Student</option>
                                        <option value='Lecturer'>Lecturer</option>
                                        <option value='Instructor'>Instructor</option>
                                        <!--<option value='Student'>Academic Staff</option>-->

                                    </select>
                                    <br>
                                    <br>
                                    <div style="text-align: center;">
                                        <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Add User" type="submit" name="addUser">
                                    </div>

                                </div>
                            </form>


                            <!--Suspend member area-->
                            <div id="member_management_panel_suspend">
                                <p class="admin_member_management_help_text">Enter the email address of the account you wish to suspend</p>
                                <input id="input_shared_info" name="firstname" class="admin_new_member_email" placeholder="Email Address" type="email">
                                <div class="resetpassword_support_text">
                                    The following account matched with the email address you provided.
                                </div>
                                <div id="selected_profile">

                                    <div class="admin_selected_profile_background">
                                        <div class="admin_selected_profile_image"></div>
                                        <div>
                                            <div class="admin_selected_profile_name">Sulochana Kodituwakku</div>

                                            <div class="admin_selected_profile_role">System Administrator<br>sulochana.456@live.com</div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Suspend User" type="submit">
                                </div>

                            </div>

                            <!--Delete member area-->
                            <div id="member_management_panel_delete">
                                <p class="admin_member_management_help_text">Enter the email address of the account you wish to delete</p>
                                <input id="input_shared_info" name="firstname" class="admin_new_member_email" placeholder="Email Address" type="email">
                                <div class="resetpassword_support_text">
                                    The following account matched with the email address you provided.
                                </div>

                                <div id="selected_profile">

                                    <div class="admin_selected_profile_background">
                                        <div class="admin_selected_profile_image"></div>
                                        <div>
                                            <div class="admin_selected_profile_name">Sulochana Kodituwakku</div>

                                            <div class="admin_selected_profile_role">System Administrator<br>sulochana.456@live.com</div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Delete User" type="submit">
                                </div>

                            </div>

                            <!--Member manage area-->
                            <div id="member_management_panel_manage">
                                <p class="admin_member_management_help_text">Enter the email address of the account that you wish to manage</p>
                                <input id="input_shared_info" name="firstname" class="admin_new_member_email" placeholder="User's Email Address" type="email">
                                <div id="selected_profile">

                                    <div class="admin_selected_profile_background">
                                        <div class="admin_selected_profile_image"></div>
                                        <div>
                                            <div class="admin_selected_profile_name">Sulochana Kodituwakku</div>

                                            <div class="admin_selected_profile_role">System Administrator<br>sulochana.456@live.com</div>
                                        </div>
                                    </div>
                                </div>
                                <p class="admin_member_management_help_text">Select the user's role inside the system</p>
                                <select id="conatct_info_opt" class="admin_new_member_role_select">
                                    <option value='Student'>Student</option>";
                                    <option value='Student'>Lecturer</option>";
                                    <option value='Student'>Instructor</option>";
                                    <option value='Student'>Academic Staff</option>";

                                </select>
                                <br>
                                <br>
                                <div style="text-align: center;">
                                    <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Update User" type="submit">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    function activate_tab(x) {
                        var tab_add = document.getElementById("member_management_panel_add");
                        var tab_suspend = document.getElementById("member_management_panel_suspend");
                        var tab_delete = document.getElementById("member_management_panel_delete");
                        var tab_manage = document.getElementById("member_management_panel_manage");
                        var navbar_add = document.getElementById("admin_memeber_manage_navbar_list_item_1");
                        var navbar_suspend = document.getElementById("admin_memeber_manage_navbar_list_item_2");
                        var navbar_delete = document.getElementById("admin_memeber_manage_navbar_list_item_3");
                        var navbar_manage = document.getElementById("admin_memeber_manage_navbar_list_item_4");

                        switch (x){
                            case 1:
                                tab_add.style.display = "block";
                                tab_suspend.style.display = "none";
                                tab_delete.style.display = "none";
                                tab_manage.style.display = "none";

                                navbar_add.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
                                navbar_suspend.className = "admin_member_management_navbar_item";
                                navbar_delete.className = "admin_member_management_navbar_item";
                                navbar_manage.className = "admin_member_management_navbar_item";
                                break;
                            case 2:
                                tab_add.style.display = "none";
                                tab_suspend.style.display = "block";
                                tab_delete.style.display = "none";
                                tab_manage.style.display = "none";

                                navbar_add.className = "admin_member_management_navbar_item";
                                navbar_suspend.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
                                navbar_delete.className = "admin_member_management_navbar_item";
                                navbar_manage.className = "admin_member_management_navbar_item";
                                break;
                            case 3:
                                tab_add.style.display = "none";
                                tab_suspend.style.display = "none";
                                tab_delete.style.display = "block";
                                tab_manage.style.display = "none";

                                navbar_add.className = "admin_member_management_navbar_item";
                                navbar_suspend.className = "admin_member_management_navbar_item";
                                navbar_delete.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
                                navbar_manage.className = "admin_member_management_navbar_item";
                                break;
                            case 4:
                                tab_add.style.display = "none";
                                tab_suspend.style.display = "none";
                                tab_delete.style.display = "none";
                                tab_manage.style.display = "block";

                                navbar_add.className = "admin_member_management_navbar_item";
                                navbar_suspend.className = "admin_member_management_navbar_item";
                                navbar_delete.className = "admin_member_management_navbar_item";
                                navbar_manage.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
                                break;
                        }
                    }

                    activate_tab(1);
                </script>
            </div>


        </div>

    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>

