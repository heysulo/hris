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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(session_id() !== ''){
        session_destroy();
    }
?>
<div class="welcome_top_gradient"></div>
<div class="welcome_section_banner">
    Password Reset Failure!
</div>
<div class="dbox welcome_section_maindbox resetpassword_fail_box" style="text-align: center;">
    Your password reset attempt failed due to some technical difficulties. This incident has being reported to the administrators. Please contact the administrator for more details.<br>
    <br>Reference code : #9856299
    <div style="text-align: center;">
        <form action="../../../index.php" method="post" onsubmit="return validateEmail();">
            <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Login" type="submit">
        </form>

    </div>

</div>




</body>


</html>