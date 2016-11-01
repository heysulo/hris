
<!DOCTYPE html>
<head>
    <?php

        define('hris_access',true);

        require_once('../../templates/path.php');
        include('../../templates/_header.php');
    ?>

    <title>HRIS | Password Reset</title>
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<?php
    session_start();
    if(session_id() !== ''){
        session_destroy();
    }
?>
<div class="welcome_top_gradient"></div>
<script>
    var step;
    step = 1;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include ("./template/steps.php"); ?>
    <div class="resetpassword_support_text">
        In prder to reset your password please enter your Email address. This email address should be the same email address which is used to create your account.

    </div>
    <div id="invalid_password_error" style="display:none;">
        <div class="resetpassword_errorbox_accountnotfound" >
            <p>Your Email address appears to be invalid.</p>
        </div>

    </div>
    <div style="text-align: center;">
        <form action="./validation/check_email.php" method="post" onsubmit="return validateEmail();">
            <input id="email" name="email" class="welcome_inputbox" placeholder="Email Address" type="email">
            <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Continue" type="submit">
        </form>

    </div>

</div>




</body>

<script>
    function validateEmail() {
        var email = document.getElementById("email").value;
        var errbox = document.getElementById("invalid_password_error");
        var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            errbox.style.display="block";
            return false;
        }else{
            return true;
        }

    }

</script>

</html>