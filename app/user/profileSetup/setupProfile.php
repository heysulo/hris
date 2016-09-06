<html>
<head>
    <title>USER </title>

    <?php
    define(hris_access,true);
    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    session_start();
    ?>
</head>

<body class="welcome_body">

<div class="welcome_top_gradient"></div>

<div class="welcome_section_banner">
    Welcome to HRIS UCSC !
</div>
<div>
    <div id="content_1">

        <div class="dbox welcome_section_maindbox">
            <?php include("steps.php"); ?>
            <div class="welcome_section_introtxt">

                Welcome to Human Resource Information System of University of Colombo School of Computing. Please create a password for your account in order to continue.
            </div>
            <div align="center"">
                <form action="" name="welcomeForm">
                    <input type="password" id="pw" name="password" class="welcome_inputbox" placeholder="Enter Password" required><br>
                    <input type="password" id="cpw" name="com_pw" class="welcome_inputbox" placeholder="Re-Enter Your Password" required><br>
                    <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step1">

            <div class="alert" id="step1_alert" style="display: none"></div>
            </div>
        </div>
    </div>

    <div id="content_2" style="display: none">

        <div class="dbox welcome_section_maindbox">
            <?php include("steps.php"); ?>
            <div class="welcome_section_introtxt">
                Enter your name name here, so the members of the system can recognize you.
                This name will be used everywhere inside the system including searches.
            </div>
            <center>
                <div class="welcome_profile_picture"><div class="welcome_new_propic">Upload Image</div></div>
                <input type="text" id="fname" name="firstname" class="welcome_inputbox" placeholder="First Name" required><br>
                <input type="text" id="mname" name="middlename" class="welcome_inputbox" placeholder="Middle Name"><br>
                <input type="text" id="lname" name="lastname" class="welcome_inputbox" placeholder="Last Name" required><br>
                <hr class="advancedsearch_hr">
                <div class="welcome_section_introtxt">
                    Select your Role and Gender.
                    Also include your academic year so the members can easily find you inside the Human Resource Information System.
                </div>
                <div>
                    <select class="welcome_dropdown" required>
                        <option value="">-- select --</option>
                        <option value="Student">Student</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Academic Staff">Academic Staff</option>
                    </select><br>
                    <input type="text" id="aca_year" name="academic_year" class="welcome_inputbox" placeholder="Academic Year"><br>
                    <select class="welcome_dropdown" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br>
                </div>

                <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step2">
                <input class="user_choose_button welcome_back_button" value="Back" type="button" id="back1">
            </center>

        </div>
    </div>

    <div id="content_3" style="display: none">
        <div class="dbox welcome_section_maindbox">
            <?php include("steps.php"); ?>
            <div class="welcome_section_introtxt">

                Enter your contact details here so others can contact you when needed. These information are only available for the members of the Human Resource Information System.
            </div>
            <?php
            include("./template/contact_info.php");
            echo "<hr class=\"welcome_profile_setup_hr\">";
            include("./template/personal_info.php");
            echo "<hr class=\"welcome_profile_setup_hr\">";
            //        include ("./template/interetst.php");
            //        echo "<hr class=\"welcome_profile_setup_hr\">";
            //        include ("./template/languages.php");
            //        echo "<hr class=\"welcome_profile_setup_hr\">";
            ?>
            <center>
                <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step3">
                <input class="user_choose_button welcome_back_button" value="Back" type="button" id="back2">
            </center>

        </div>
    </div>

    <div id="content_4" style="display: none">
        <div class="dbox welcome_section_maindbox">
            <?php include("steps.php"); ?>
            <div class="welcome_section_introtxt">
                Enter your interests\skill and the languages that you are capable of speaking and writing. This information will be available for the members of the Human Resource Information System.
            </div>
            <?php
            include ("./template/interetst.php");
            echo "<hr class=\"welcome_profile_setup_hr\">";
            include ("./template/languages.php");
            ?>
            <div style="text-align: center;">

                <input class="user_choose_button welcome_continue_button" value="Go to Dashboard" type="button" id="step4">
                <input class="user_choose_button welcome_back_button" value="Back" type="button" id="back3">
            </div>
            </form>
        </div>
    </div>

</div>

<script src="<?php echo $publicPath?>js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $publicPath?>js/jquery.validate.min.js"></script>
<script>

    $(document).ready(function () {

        $('div#step1').addClass('welcome_step_active');

        /*Forward button*/
        $('input#step1').click(function () {

            //form validation..
            if ($('#pw').val() != "" ){
                if($('#pw').val() == $('#cpw').val()){
                    $('#content_1').fadeOut();
                    $('#content_2').fadeIn();
                    $('div#step2').addClass('welcome_step_active');
                    $('div#step1').removeClass('welcome_step_active');
                }else{
                    $('#step1_alert').text("Password not matched.");
                    $('#step1_alert').css('display','block');
                }
            }else{
                $('#step1_alert').text("Password field can't be empty.");
                $('#step1_alert').css('display','block');
            }

        });

        $('input#step2').click(function () {
            $('#content_2').fadeOut();
            $('#content_3').fadeIn();
            $('body').scrollTop(0);
            $('div#step3').addClass('welcome_step_active');
            $('div#step2').removeClass('welcome_step_active');
        });

        $('input#step3').click(function () {
            $('#content_3').fadeOut();
            $('#content_4').fadeIn();
            $('body').scrollTop(0);
            $('div#step4').addClass('welcome_step_active');
            $('div#step3').removeClass('welcome_step_active');
        });

        $('input#step4').click(function () {
            $('#content_4').fadeOut();
        });

        /*Backword button*/
        $('input#back1').click(function () {
            $('#content_2').fadeOut();
            $('#content_1').fadeIn();
            $('body').scrollTop(0);
            $('div#step1').addClass('welcome_step_active');
            $('div#step2').removeClass('welcome_step_active');
        });

        $('input#back2').click(function () {
            $('#content_3').fadeOut();
            $('#content_2').fadeIn();
            $('body').scrollTop(0);
            $('div#step2').addClass('welcome_step_active');
            $('div#step3').removeClass('welcome_step_active');
        });

        $('input#back3').click(function () {
            $('#content_4').fadeOut();
            $('#content_3').fadeIn();
            $('body').scrollTop(0);
            $('div#step3').addClass('welcome_step_active');
            $('div#step4').removeClass('welcome_step_active');
        });
        

    });


</script>

</body>

</html>