<html>
<head>
    <title>USER </title>
    <link rel="stylesheet" type="text/css" href="../public/css/artista.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
    <script>
        var step = 1;
    </script>
    <div class="welcome_section_banner">
        Welcome to HRIS UCSC !
    </div>
    <div class="dbox welcome_section_maindbox">
        <?php include ("./template/steps.php"); ?>
        <div class="welcome_section_introtxt">

            Welcome to Human Resource Information System of University of Colombo School of Computing. Please create a password for your account in order to continue.
        </div>
        <div align="center">
            <input type="password" id="fname" name="firstname" class="welcome_inputbox" placeholder="Enter Password"><br>
            <input type="password" id="fname" name="firstname" class="welcome_inputbox" placeholder="Re-Enter Your Password"><br>
            <input class="user_choose_button welcome_continue_button" value="Continue" type="button">
        </div>
    </div>



</body>


</html>