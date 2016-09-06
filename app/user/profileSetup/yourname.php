    <html>
<head>
    <title>USER </title>
    <link rel="stylesheet" type="text/css" href="../public/css/artista.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">

<div class="welcome_top_gradient"></div>

    <script>
        var step = 2;
    </script>

    <div class="welcome_section_banner">
        Welcome to HRIS UCSC !
    </div>

    <div class="dbox welcome_section_maindbox">
        <?php include ("./template/steps.php"); ?>
        <div class="welcome_section_introtxt">
            Enter your name name here, so the members of the system can recognize you. This name will be used everywhere inside the system including searches.
        </div>
        <center>
        <div class="welcome_profile_picture"><div class="welcome_new_propic">Upload Image</div></div>
        <input type="text" id="fname" name="firstname" class="welcome_inputbox" placeholder="First Name"><br>
        <input type="text" id="fname" name="firstname" class="welcome_inputbox" placeholder="Middle Name"><br>
            <input type="text" id="fname" name="firstname" class="welcome_inputbox" placeholder="Last Name"><br>
            <hr class="advancedsearch_hr">
            <div class="welcome_section_introtxt">
                Select your Role and Gender. Also include your academic year so the members can easily find you inside the Human Resource Information System.
            </div>
            <div>
                <select class="welcome_dropdown">
                    <option value="volvo">Student</option>
                    <option value="saab">Instructor</option>
                    <option value="opel">Lecturer</option>
                    <option value="audi">Academic Staff</option>
                </select><br>
                <input type="text" id="fname" name="firstname" class="welcome_inputbox" placeholder="Academic Year"><br>
                <select class="welcome_dropdown">
                    <option value="volvo">Male</option>
                    <option value="saab">Female</option>
                </select><br>
            </div>

            <input class="user_choose_button welcome_continue_button" value="Continue" type="button">
        </center>

    </div>



</body>


</html>