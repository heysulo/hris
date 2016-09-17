<?php
    define(hris_access,true);
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="Description" content="The Human Resource Information System is a place where you can access the shared information of the academic staff and the students of the University of Colombo School of Computing.">
    <meta name="Keywords" content="HRIS,UCSC,University Students Information,Skill Directory">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>HRIS UCSC</title>
    <link rel="stylesheet" type="text/css" href="public/css/artista.css">


</head>
<body>
    <div class="loginmaindiv">
        <div>
            <div class="introbox">
                <center>
                    <img src="public/img/ucsc_logo.png" alt="logo">
                    <h1 class="head1" style="color:#000">Human Resource Information System</h1>
                    <div>
                        <p class="logindesc">The Human Resource Information System is a place where you can access the shared information of the academic staff and the students of the University of Colombo School of Computing.
<br><br>The Objective of this system is to enhance the communication between the academic staff, students and the other interested 3rd parties.</p>
                    </div>
                </center>
            </div>
        </div>
        <center>
            <div class="login_box">
                <form action="app/user/login.php" method="post">
                    <div>
                        <div style="max-width:300px;">
                            <center>
                                <p class="anitxt1">Login to the Human Resource
                                Information Center of UCSC as a registered member and access the full features.</p>
                            </center>
                        </div>
                        <input class="txt_field" type="text" name="email" placeholder="Email Address" required>
                        <input class="txt_field" type="password" name="password" placeholder="Password" required>
                        <div class="spacerx"></div>
                        <div class="spacerx"></div>

                        <!--Button to login user-->
                        <input type="submit" name="loginbtn" class="user_choose_button" value="Login as Member">

                        <!--error massage for wrong user login data-->
                        <?php
                        if(isset($_GET['error'])){
                            echo "<div class=\"alert\">Username password mismatch.<br>Please try again or try forget password.</div>";
                        }
                        ?>

                        <div class="spacerx"></div>
                        <div>
                            <a class="txtassist" href="app/user/password_reset/password_reset.php" style="text-align: left;">Forgot your password</a>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <a class="txtassist" href="Google.lk" style="text-align: right; ">Contact Administrator</a>
                        </div>
                        <div class="spacerx"></div>
                        <div class="spacerx"></div>
                        <hr class="hrstyle">
                        <div class="spacerx"></div>
                        <center style="color:#5F5F5F;"><p class="anitxt1">Login to the Human Resource
                                Information Center of UCSC as guest and access the skill directory.</p></center>
                </form>
                        <!-- _________________ separated to two forms ______________________ -->

                <!-- THis form temporary un available... Sulo.... mewa nm ain kranna epa bn... aye nm mata gahanna ba..
                    <form action="app/public_user/public.php" method="get">
                    <div>
                        <!--btn to access public user area.
                        <input type="submit" class="user_choose_button" value="General Public" name="publicUserBtn">
                    </div>
                </form>-->
                        <a href="./dashboard/index.php">
                        <input type="button" class="user_choose_button" value="General Public"></a>
            </div>
        </center>
    </div>

    <div class="bottomline">
        <center>
            <p>All rights reserved by University of Colombo School of Computing<br>
            No: 35, Reid Avenue, Colombo 7, Sri Lanka.</p>
        </center>
    </div>

    <div class="bg_blurredimg"></div>

</body>
</html>