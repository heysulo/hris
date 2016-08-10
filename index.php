<<<<<<< HEAD
<html>
<head>
    <title>HRIS UCSC</title>
    <link rel="stylesheet" type="text/css" href="public/css/artista.css">
</head>
<body>
<div id="overlay"></div>
<div class="bg_blurredimg"></div>

<div class="login_box_outer">

    <center>

        <img src="public/img/ucsc_logo.png">
        <h1 class="head1" style="color:#000">Human Resource Information System</h1>
        <div>
            <p class="logindesc">A Human Resource Information System for University of Colombo School of Computing
                which will enhance the communications between the academic staff and the students of UCSC</p>
        </div>
        <div class="login_box">
            <form action="action_page.php">
                <div>
                    <div style="max-width:300px;">
                        <center>
                            <p class="anitxt1">Login to the Human Resource
                            Information Center of UCSC as a registered member and access the full features.</p>
                        </center>
                    </div>
                    <input class="txt_field" type="text" id="fname" name="firstname" placeholder="Email Address">
                    <input class="txt_field" type="password" id="lname" name="lastname" placeholder="Password">
                    <div class="spacerx"></div>
                    <div class="spacerx"></div>
                    <input type="button" class="user_choose_button" value="Login as Member">
                    <div class="spacerx"></div>
                    <div>
                        <a class="txtassist" href="Google.lk" style="text-align: left;">Forgot your password</a>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <a class="txtassist" href="Google.lk" style="text-align: right; ">Contact Administrator</a>
                    </div>
                    <div class="spacerx"></div>
                    <div class="spacerx"></div>
                    <hr class="hrstyle">
                    <div class="spacerx"></div>
                    <center style="font-size:13px;color:#5F5F5F;"><p class="anitxt1">Login to the Human Resource
                            Information Center of UCSC as guest and access the skill directory.</p></center>
                    <a href="app/view/templates/profile.php">
                        <input type="button" class="user_choose_button" value="General Public"></a>
                </div>
            </form>
        </div>

    </center>
</div>


<script type="text/javascript" src="public/js/jquery-2.2.4.min.js" ></script>

<script type="text/javascript">
    $(window).load(function () {
        $("#overlay").fadeOut();
    });
</script>
</body>
=======
<!DOCTYPR>
<html>
<head>
    <title>HRIS UCSC</title>
    <link rel="stylesheet" type="text/css" href="public/css/artista.css">
</head>
<body>
<div id="overlay"></div>
<div class="bg_blurredimg"></div>

<div class="login_box_outer">

    <center>

        <img src="public/img/ucsc_logo.png">
        <h1 class="head1" style="color:#000">Human Resource Information System</h1>
        <div style="max-width: 600px;color:#5F5F5F;">
            <p style="color:#000">A Human Resource Information System for University of Colombo School of Computing
                which will enhance the communications between the academic staff and the students of UCSC</p>
        </div>
        <div class="login_box">
            <form action="login.php">
                <div>
                    <center style="font-size:13px;color:#5F5F5F;"><p class="anitxt1">Login to the Human Resource
                            Information Center of UCSC as a registered member and access the full features.</p></center>
                    <input class="txt_field" type="text" id="email" name="email" placeholder="Email Address">
                    <input class="txt_field" type="password" id="password" name="password" placeholder="Password">
                    <div class="spacerx"></div>
                    <div class="spacerx"></div>
                    <input type="submit" name="loginbtn" class="user_choose_button" value="Login as Member">
                    <div class="spacerx"></div>
                    <div>
                        <a class="txtassist" href="#" style="text-align: left;">Forgot your password</a>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <a class="txtassist" href="#" style="text-align: right; ">Contact Administrator</a>
                    </div>
                    <div class="spacerx"></div>
                    <div class="spacerx"></div>
                    <hr class="hrstyle">
                    <div class="spacerx"></div>
                    <center style="font-size:13px;color:#5F5F5F;"><p class="anitxt1">Login to the Human Resource
                            Information Center of UCSC as guest and access the skill directory.</p></center>
                    <a href="app/view/profile.php">
                        <input type="button" class="user_choose_button" value="General Public"></a>
                </div>
                <div class="spacerx"></div>

            </form>
            <div>
                <p style="padding-top:35px;color:#f1f1f1;font-size:13px;">Development conducted by Team Helix</p>

    </center>
</div>


<script type="text/javascript" src="public/js/jquery-2.2.4.min.js" ></script>

<script type="text/javascript">
    $(window).load(function () {
        $("#overlay").fadeOut();
    });
</script>
</body>
>>>>>>> 08946d6d924e531e5abe69432cebdf114795c81b
</html>