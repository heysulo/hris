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
    step = 4;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include ("./template/steps.php"); ?>
    <div class="resetpassword_support_text">
        Please enter a new password for your account. When you create a new password, make sure that it's at least 6 characters long. Try to use a complex combination of numbers, letters and punctuation marks.
    </div>
    <div style="text-align: center;">
        <input id="fname" name="firstname" class="welcome_inputbox" placeholder="Re-Enter Your Password" type="password">

        <input id="fname" name="firstname" class="welcome_inputbox" placeholder="Re-Enter Your Password" type="password">
        <input class="user_choose_button welcome_continue_button" value="Change My Password" type="button">
    </div>

</div>



</body>


</html>