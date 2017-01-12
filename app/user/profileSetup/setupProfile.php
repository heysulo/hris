<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="Description" content="The Human Resource Information System is a place where you can access the shared information of the academic staff and the students of the University of Colombo School of Computing.">
    <meta name="Keywords" content="HRIS,UCSC,University Students Information,Skill Directory">
    <link rel='shortcut icon' href='/hris/favicon.ico' type='image/x-icon'/ >
    <meta name="author" content="team helix">

    <title>HRIS - Profile Setup</title>

    <?php
    define("hris_access",true);

    $publicPath = "http://".$_SERVER['HTTP_HOST']."/hris/public/";
    $templatePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/";
    $imagePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/images";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $conn = null;
    require_once("../config.conf");
    require_once ("../../database/database.php");
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/artista.css">

    <style>
        input{
            font-size: 1em;
        }

        select{
            font-size: .9em;
        }

    </style>
</head>

<body class="welcome_body">
<?php
$token = 0;
if (isset($_GET['token'])){
    $token = $_GET['token'];
}else{
    $token = 0;
}
$query1 = "SELECT * FROM invitation WHERE token=\"".$token."\" ";
$res1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($res1)){
$row = mysqli_fetch_assoc($res1);
$email = htmlspecialchars_decode($row['email']);
$_SESSION['email'] = $email;

?>

<div class="welcome_top_gradient"></div>

<div class="welcome_section_banner">
    Welcome to HRIS UCSC !
</div>
<div>
    <form action="submitForm.php" name="welcomeForm" method="post" enctype="multipart/form-data">

        <!--Set email address to hiden element-->
        
        <!--Step 1 . Get user password-->
        <div id="content_1">

            <div class="dbox welcome_section_maindbox">
                <?php include("steps.php"); ?>
                <div class="welcome_section_introtxt">

                    Welcome to Human Resource Information System of University of Colombo School of Computing. Please create a password for your account in order to continue.
                </div>
                <div align="center">
                        <input type="password" id="pw" name="password" class="welcome_inputbox" placeholder="Enter Password" required><br>
                        <input type="password" id="cpw" name="com_pw" class="welcome_inputbox" placeholder="Re-Enter Your Password" required><br>
                        <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step1">

                <div class="alert" id="step1_alert" style="display: none"></div>
                </div>
                </div>
            </div>
        </div>

        <!--Step 2. Get user basic details.-->
        <div id="content_2" style="display: none">

            <div class="dbox welcome_section_maindbox">
                <?php include("steps.php"); ?>
                <div class="welcome_section_introtxt">
                    Enter your name here, other members of the system can recognize you.
                    This name will be used everywhere inside the system including searches.
                </div>
                <center>
                    <div class="welcome_profile_picture" id="pro_pic">
                        <div class="welcome_new_propic" id="pro_pic_text">
                            Upload Image
                            <input type="file" style="display: none" accept="image/*" name="pro_pic_img" id="pro_pic_img" >
                            <input type="button" value="Browse" style="font-size: .8em" onclick="document.getElementById('pro_pic_img').click();">
                        </div>
                    </div>


                    <input type="text" id="fname" name="firstName" class="welcome_inputbox" placeholder="First Name" required><br>
                    <input type="text" id="mname" name="middlename" class="welcome_inputbox" placeholder="Middle Name"><br>
                    <input type="text" id="lname" name="lastname" class="welcome_inputbox" placeholder="Last Name" required><br>
                    <div class="alert" id="step2_alert_1" style="display: none"></div>
                    <hr class="advancedsearch_hr">
                    <div class="welcome_section_introtxt">
                        Select your Role and Gender.
                        Also include your academic year, then members can easily find you inside the Human Resource Information System.
                    </div>
                    <div>
                        <select class="welcome_dropdown" name="category" id="role" required>
                            <option value="">-- Select your role --</option>
                            <option value="Student">Student</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Academic Staff">Academic Staff</option>
                        </select><br> <br>

                        <?php
                        $q2 = mysqli_query($conn,"SELECT * FROM batchList");
                        if ($q2){?>
                            <select style="display: none" name="batch" class="welcome_dropdown"  id="batch_id" required>
                                <option value="">-- Select your year --</option>
                                <?php
                                while($row = mysqli_fetch_assoc($q2)){
                                    $batch= $row['batch'];
                                    $bb = ltrim($batch,'B');
                                    echo "<option value='$batch'> $bb </option>";

                                }?>
                            </select>
                            <?php
                        }
                        ?>

                        <div>
                        <input type="text" style="display: none" id="reg_number" name="registration_number" class="welcome_inputbox" placeholder="Registration Number">
                        <input style="display: none" type="text" id="index_number" name="index_number" class="welcome_inputbox" placeholder="Index Number">

                        </div>
                        <br>


                        <select class="welcome_dropdown" name="gender" id="gender" required>
                            <option value="">-- Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br>
                        <div class="alert" id="step2_alert_2" style="display: none"></div>
                    </div>

                    <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step2">
                    <input class="user_choose_button welcome_back_button" value="Back" type="button" id="back1">
                </center>

            </div>
        </div>


        <!--Step 3 . Get contact info and some personal info-->
        <div id="content_3" style="display: none">
            <div class="dbox welcome_section_maindbox">
                <?php include("steps.php"); ?>
                <div class="welcome_section_introtxt">

                    Enter your contact details here so others can contact you when needed. These information are only available for the members of the Human Resource Information System.
                </div>
                <?php
                    include("./includes/important_info.php");
                    echo "<hr class=\"welcome_profile_setup_hr\">";
                    include("./includes/contact_info.php");
                    echo "<hr class=\"welcome_profile_setup_hr\">";
                    include("./includes/personal_info.php");
                    echo "<hr class=\"welcome_profile_setup_hr\">";

                ?>

                <center>
                    <div class="alert" id="step3_alert" style="display: none"></div>
                    <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step3">
                    <input class="user_choose_button welcome_back_button" value="Back" type="button" id="back2">
                </center>

            </div>
        </div>

        <!--Step 4. GEt skills and interests-->
        <div id="content_4" style="display: none">
            <div class="dbox welcome_section_maindbox">
                <?php include("steps.php"); ?>
                <div class="welcome_section_introtxt">
                    Enter your interests\skill and the languages that you are capable of speaking and writing. This information will be available for the members of the Human Resource Information System.
                </div>
                <?php
                    include("./includes/interetst.php");
                    echo "<hr class=\"welcome_profile_setup_hr\">";
                    //include("./includes/languages.php");
                ?>
                <br>
                <div style="text-align: center; margin-top: auto">

                    <input class="user_choose_button welcome_continue_button" value="Complete Profile Setup" type="submit" id="step4" name="submit">
                    <input class="user_choose_button welcome_back_button" value="Back" type="button" id="back3">

                </div>

            </div>
        </div>
    </form>
</div>
<?php }else{?>
    <div class="error_page_box">
        <div class="error_page_text">The link you followed may be broken, or the page may have been removed.</div>
    </div>

<?php }?>
<script src="<?php echo $publicPath?>js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $publicPath?>js/jquery.validate.min.js"></script>
<script src="<?php echo $publicPath?>js/bday-picker.js"></script>
<script>


    var validate = false;

    $(document).ready(function () {

        $('div#step1').addClass('welcome_step_active');

        /*Forward button*/
        $('input#step1').click(function () {

            //form validation..
            if ($('#pw').val() != "" ){
                $('#step1_alert').css('display','none');
                if($('#pw').val() == $('#cpw').val()){
                    $('#step1_alert').css('display','none');
                    if($('#pw').val().length > 7){
                        $('#step1_alert').css('display','none');
                        $('#content_1').fadeOut();
                        $('#content_2').fadeIn();
                        $('div#step2').addClass('welcome_step_active');
                        $('div#step1').removeClass('welcome_step_active');
                    }else{
                        $('#step1_alert').text("Password must be strong. Please use more than 8 characters");
                        $('#step1_alert').css('display','block');
                    }
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

            //Validate fields...
            if($('#fname').val()=="" || $('#lname').val() == ""){
                $('#step2_alert_1').text("First name and last must be filled.");
                $('#step2_alert_1').css('display','block');
            }else{

                $('#step2_alert_1').css('display','none');
                if($('#role').val() == ""){
                    $('#step2_alert_2').text("Please select your roll.");
                    $('#step2_alert_2').css('display','block');
                }else if($('#role').val() == "Student"){
                    $('#step2_alert_2').css('display','none');
                    indexValidityCheck();
                    if( validate ){
                        $('#step2_alert_2').css('display','none');
                        $('#content_2').fadeOut();
                        $('#content_3').fadeIn();
                        $('body').scrollTop(0);
                        $('div#step3').addClass('welcome_step_active');
                        $('div#step2').removeClass('welcome_step_active');
                    }else{
                        $('#step2_alert_2').text("Please check Register Number and Index Number.");
                        $('#step2_alert_2').css('display','block');
                    }
                }else{
                    $('#step2_alert_2').css('display','none');
                    if($('#gender').val() ==""){
                        $('#step2_alert_2').text("Please select gender.");
                        $('#step2_alert_2').css('display','block');
                    }else{
                        $('#step2_alert_2').css('display','none');
                        $('#content_2').fadeOut();
                        $('#content_3').fadeIn();
                        $('body').scrollTop(0);
                        $('div#step3').addClass('welcome_step_active');
                        $('div#step2').removeClass('welcome_step_active');
                    }

                }
            }

        });

        $('input#step3').click(function () {
            if ($('.birthDate').val() == 0 || $('.birthMonth').val() == 0 || $('.birthYear').val() ==0){
                $('#step3_alert').text("Please submit your date of birth.");
                $('#step3_alert').css('display','block');
            }else{
                $('#step3_alert').css('display','none');
                if ($('#currentCity').val()==""){
                    $('#step3_alert').text("Please select your Current City");
                    $('#step3_alert').css('display','block');
                }else{
                    $('#step3_alert').css('display','none');
                    if ($('#hometown').val()==""){
                        $('#step3_alert').text("Please select your Home town");
                        $('#step3_alert').css('display','block');
                    }else {
                        $('#step3_alert').css('display', 'none');
                        $('#content_3').fadeOut();
                        $('#content_4').fadeIn();
                        $('body').scrollTop(0);
                        $('div#step4').addClass('welcome_step_active');
                        $('div#step3').removeClass('welcome_step_active');

                        $('#user_birth_day').val($('#birthdate').val());
                    }
                }

            }

        });



        /*-------------------------------------------------------------------------------*/
        /*Backward button*/
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


        // Function for Preview Image.
        $(function() {
            $("#pro_pic_img").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $('#pro_pic').css('background-image', 'url('+e.target.result+')');
        }
        //Function for check birth day fields
        $('#birthDayFields').birthdaypicker();

    });;

//    Academic year enable validation

    $('#role').change(function(){
        if ($('#role').val() == "Student"){
            $('#batch_id').css('display','block');
            $('#batch_id').prop('selectedIndex',0);
        }else{
            $('#batch_id').css('display','none');
            $('#reg_number').css('display','none');
            $('#index_number').css('display','none');
            $('#index_validate_alert').css('display','none');
            $('#index_number').val("");
        }
    });

    $('#batch_id').change(function(){
        if($(this).val() != ""){
            $('#reg_number').css('display','block');
            $('#index_number').css('display','block');
        }else{
            $('#reg_number').css('display','none');
            $('#index_number').css('display','none');
            $('#index_validate_alert').css('display','none');
            $('#index_number').val("");
        }

    });

//    Function to check validity of index number and register number
    function indexValidityCheck(){
        var index = $('#index_number').val();
        var reg = $('#reg_number').val();
        var batch = $('#batch_id').val();

        $.ajax({
            url:'validateIndex.php',
            data:{'index':index,'reg':reg,'batch':batch},
            method:'POST',
            success:function(resp){
                $('#step2_alert_2').css('display','none');
                if(resp == 1){
                    $('#step2_alert_2').css('display','block');
                    $('#step2_alert_2').text('Already system has a account using this Index Number and Registration Number. Please try again.');
                }else if (resp == 0) {
                    validate = true;
                } else {
                    $('#step2_alert_2').css('display', 'block');
                    $('#step2_alert_2').text('Index number / Registration Number not valid. .Please check again.');
                }
            }
        });
    }

    $('#index_number').keyup(function(){
        if($(this).val().length == 8){
            indexValidityCheck();
        }else if($(this).val().length >8){
            $(this).val($(this).val().substr(0,8));
        }else{
            $('#index_validate_alert').css('display','none');

        }
    });


    /*Contact info insert function*/
    function insertContactInfo() {
        var par = document.getElementById("contact_info_item_container");
        var val = document.getElementById("new_contact_input").value;
        var opt = document.getElementById("conatct_info_opt").value;
        var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\">" +
            "<div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div>" +
            "<div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'>" +
            "</div><div class=\"edit_profile_contactinfo_item_value\">"+val+"</div>" + "<input type='hidden' name='contactInfo["+opt+"]' value='"+val+"'>"+ "</div>";
        par.innerHTML += code;
    }

    // <input type="hidden" name="contactInfo['']" value="">

    /*Skills data insert function*/
    function insertSkill() {
        var par = document.getElementById("skill_item_container");
        var val = document.getElementById("new_skill_input").value;
        var code =  "<div class=\"skill_item\">" +
                    "<div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\">" +
                    "</div>"+val+"<input type='hidden' name='interestSkillItem["+'skill'+"]' value='"+val+"'></div>";
        par.innerHTML += code;
        //
    }

    /*Shared info adding function*/
    function insertsharedInfo() {
        var par = document.getElementById("shared_info_container");
        var opt = document.getElementById("shared_info_opt").value;
        var val = document.getElementById("input_shared_info").value;
        var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\">" +
            "<div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div>" +
            "<div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'></div>" +
            "<div class=\"edit_profile_contactinfo_item_value\">"+val+"</div>" +
            "</div>";
        par.innerHTML += code;
    }

    /*Language data enter function*/
    function insertLanguage() {
        var par = document.getElementById("language_item_container");
        var val = document.getElementById("new_language_input").value;
        var code = "<div class=\"skill_item language_item\"><div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\"></div>"+val+"</div>";
        par.innerHTML += code;
    }

</script>

</body>

</html>