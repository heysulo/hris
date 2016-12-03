<!DOCTYPE html>
<html>
<head>
    <title>USER </title>
    <link rel="stylesheet" type="text/css" href="../public/css/artista.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<div class="welcome_top_gradient"></div>
<script>
    var step;
    step = 3;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include("./template/steps.php"); ?>
    <div class="resetpassword_support_text">
        Please check your email for a message from HRIS conataining a code which is 8 digits long. Enter that code in order to continue the password reset process.<br><br> If you requested a new password but didn't receive your password-reset email check the spam or junk mail folder in your email account.
    </div>
    <div>
        <?php include("./template/invalidCode.php"); ?>
    </div>
    <div style="text-align: center;">
        <input id="fname" name="firstname" class="welcome_inputbox resetpassword_verification_input" placeholder="########" type="number">

        <input class="user_choose_button welcome_continue_button" value="Continue" type="button">
    </div>

</div>



</body>


</html>