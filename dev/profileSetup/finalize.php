<html>
<head>
    <title>USER </title>
    <link rel="stylesheet" type="text/css" href="../public/css/artista.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<div class="welcome_top_gradient"></div>
<script>
    var step = 4;
</script>
<div class="welcome_section_banner">
    Welcome to HRIS UCSC !
</div>
<div class="dbox welcome_section_maindbox">
    <?php include("./template/steps.php"); ?>
    <div class="welcome_section_introtxt">
        Enter your interests\skill and the languages that you are capable of speaking and writing. This information will be available for the members of the Human Resource Information System.
    </div>
    <?php
        include("./template/interetst.php");
        echo "<hr class=\"welcome_profile_setup_hr\">";
        include("./template/languages.php");
    ?>
    <div style="text-align: center;">

        <input class="user_choose_button welcome_continue_button" value="Go to Dashboard" type="button">
    </div>

</div>



</body>


</html>