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
    step = 1;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include("./template/steps.php"); ?>
    <div class="resetpassword_support_text">
        In prder to reset your password please enter your Email address. This email address should be the same email address which is used to create your account.
    </div>
    <div style="text-align: center;">
        <form>
            <input id="email" name="email" class="welcome_inputbox" placeholder="Email Address" type="email">
            <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Go to Dashboard" type="button">
        </form>

    </div>

</div>

<?php

?>


</body>


</html>