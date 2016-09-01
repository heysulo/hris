<html>
<head>
    <title>USER </title>
    <link rel="stylesheet" type="text/css" href="../public/css/artista.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
    <script>
        var step = 3;
    </script>
    <div class="welcome_section_banner">
        Welcome to HRIS UCSC !
    </div>
    <div class="dbox welcome_section_maindbox">
        <?php include ("./template/steps.php"); ?>
        <div class="welcome_section_introtxt">

            Enter your contact details here so others can contact you when needed. These information are only available for the members of the Human Resource Information System.
        </div>
        <?php
        include("./template/contact_info.php");
        echo "<hr class=\"welcome_profile_setup_hr\">";
        include("./template/personal_info.php");
        echo "<hr class=\"welcome_profile_setup_hr\">";
//        include ("./template/interetst.php");
//        echo "<hr class=\"welcome_profile_setup_hr\">";
//        include ("./template/languages.php");
//        echo "<hr class=\"welcome_profile_setup_hr\">";
        ?>
        <center>
            <input class="user_choose_button welcome_continue_button" value="Continue" type="button">
        </center>

    </div>



</body>


</html>