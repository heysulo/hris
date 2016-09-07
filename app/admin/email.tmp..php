<!DOCTYPE html>
<head>
    <?php
    define(hris_access,true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    session_start();

    $email = $_GET['li'];

    $link = "http://localhost/hris/app/user/profileSetup/setupProfile.php?em='$email'";

    ?>
    <title>HRIS | Sample Email</title>
</head>
<body>
<div style="padding: 0px; ">

    <div class="bottomPanel" style="height: 100%; width: 100%;;">

        <div class="cbox">
            <h2>Welcome to UCSC Human Resource Information System.</h2>
            <p>Use below link to setup your new account.</p>
            <a href="<?php echo $link ?>"><?php echo $link ?></a>
        </div>

    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>