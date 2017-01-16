<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);

    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    ?>

    <title>HRIS | Account Create</title>
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
    Profile Setup Success!
</div>
<div class="dbox welcome_section_maindbox resetpassword_success_box" style="text-align: center;">
    Your account has being successfully created. Now you can login to HRIS system.
    <div style="text-align: center;">
        <form action="../../../index.php" method="post">
            <input id="btnsubmit" class="user_choose_button welcome_continue_button" value="Login" type="submit">
        </form>

    </div>

</div>




</body>


</html>