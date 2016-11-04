<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);

    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ((!isset($_SESSION["email"])) || !isset($_SESSION["validation_success"]) || ($_SESSION["validation_success"])==0 || !isset($_SESSION["badtry"]) || $_SESSION["badtry"]==1 ){
        header('Location: '."./password_reset.php");
    }
    ?>

    <title>HRIS | Password Reset</title>
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
    <div id="error_box" class="resetpassword_errorbox_accountnotfound" style="display: none;">
        <p>Your search did not yield any result. Please make sure you entered the correct email address which was used to create your account.</p>
    </div>
    <div style="text-align: center;">
        <form id="form_new_password" onsubmit="return password_verification_client();" method="post" action="validation/password_renew.php">
            <input id="password_1" name="password" class="welcome_inputbox" placeholder="Enter Your Password" type="password" autocomplete="off" >
            <input id="password_2" name="password_verify" class="welcome_inputbox" placeholder="Re-Enter Your Password" type="password" autocomplete="off" >
            <input class="user_choose_button welcome_continue_button" value="Change My Password" type="submit">
        </form>
    </div>
    <script>
        function password_verification_client() {
            var erb = document.getElementById("error_box");
            var x = document.getElementById("password_1").value;
            var y = document.getElementById("password_2").value;
            if(x !=y ){
                erb.style.display = "block";
                erb.innerHTML="<p>The two passwords you entered does not match. In order to continue please enter the same new password in both the input fields</p>"
                return false;
            }else{
                if (x.length > 5){

                    erb.style.display = "none";
                    return true;
                }else{
                    erb.style.display = "block";
                    erb.innerHTML="<p>The two passwords you entered does not meet the minimum password requirement of a length of 6 characters</p>"
                    return false;
                }
            }
        }
    </script>

</div>
    


</body>

