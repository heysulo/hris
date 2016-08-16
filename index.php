<!DOCTYPR>
<html>
<head>
    <title>HRIS UCSC</title>
    <link rel="stylesheet" type="text/css" href="public/css/artista.css">
</head>
<body>

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
            <form action="app/user/login.php" method="POST">
                <div>
                    <center style="font-size:1em;color:#5F5F5F;"><p class="anitxt1">Login to the Human Resource
                            Information Center of UCSC as a registered member and access the full features.</p></center>

                    <!--User login data input area-->
                    <input class="txt_field" type="text" id="email" name="email" placeholder="Email Address" required>
                    <input class="txt_field" type="password" id="password" name="password" placeholder="Password" required>

                    <div class="spacerx"></div>
                    <div class="spacerx"></div>

                    <!--btn to login action-->
                    <input type="submit" name="loginbtn" class="user_choose_button" value="Login as Member">

                    <!--error massage for wrong user login data-->
                    <?php
                        if($_GET['error']){
                            echo "<div class=\"alert\">Username password mismatch.<br>Please try again or try forget password.</div>";
                        }
                    ?>


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
                    <center style="color:#5F5F5F;"><p class="anitxt1">Login to the Human Resource
                            Information Center of UCSC as guest and access the skill directory.</p></center>
                </div>
            </form>

            <!-- _________________ separated to two forms ______________________ -->

            <form action="app/user/public.php" method="get">
                <div>
                    <!--btn to access public user area.-->
                    <input type="submit" class="user_choose_button" value="General Public" name="publicUserBtn">
                </div>
            </form>
        <div>
        <p style="padding-top:10px;color:gray;font-size:13px;">Development conducted by Team Helix</p>

    </center>
</div>


<script type="text/javascript" src="public/js/jquery-2.2.4.min.js" ></script>

</body>
</html>