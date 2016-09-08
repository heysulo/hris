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

<div class="dbox group_group_dbox" >
    <div class="group_group_dbox_image"></div>
    <div class="group_dbox_title">Computer Science Societ Allah huak baaaaaaryssss ssssssss</div>

    <div class="group_dbox_category">Entertainment</div>
    <div class="group_dbox_description">so I have given it a width and then margin:0 auto. It works fine with the max-sized browser but when I zoom in or resize the browser width to about half, the background of the header div starts to disappear at some point and does not fill in 100% width.</div>
</div>




</body>


</html>