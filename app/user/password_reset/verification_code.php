<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    ?>
    <?php
        session_start();
        $conn = null;
        require_once("../config.conf");
        require_once ("../../database/database.php");
        if (!isset($_SESSION["email"])){
            header('Location: '."./password_reset.php");
        }
        $email = $_SESSION["email"];
        $query = "SELECT password_reset_attempts,password_reset_block FROM member WHERE email='$email'";
        $res = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($res);
        $password_reset_block = $row['password_reset_block'];
        $password_reset_attempts = $row['password_reset_attempts'];
        if (isset($_SESSION["block"])){
            header('Location:'. "account_blocked.php");
        }
        if ((strtotime(date('Y-m-d H:i:s'))-strtotime($password_reset_block))/3600 < 24){
            $_SESSION["block"]="yes";
            $_SESSION["code_active"]=0;
            header('Location: '."./account_blocked.php");
        }
        if (!isset($_SESSION["email"])){
            header('Location:'. "password_reset.php");
        }
    ?>
    <title>HRIS | Password Reset</title>
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<div class="welcome_top_gradient"></div>
<script>
    var step;
    step = 3;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include ("./template/steps.php"); ?>
    <div class="resetpassword_support_text">
        Please check your email for a message from HRIS conataining a code which is 8 digits long. Enter that code in order to continue the password reset process.<br><br> If you requested a new password but didn't receive your password-reset email check the spam or junk mail folder in your email account.
    </div>
    <div>
        <?php
        if (isset($_SESSION["badtry"])){
                if($_SESSION["badtry"]==1){
                    include ("./template/invalidCode.php");
                }
            }

        ?>
    </div>
    <script>
        function isvalidcode() {
            var txt = document.getElementById("verification_code").value;
            //window.alert(txt.length);
            if (txt.length == 8){
                return true;

            }else{
                window.alert("Enter a valid verification code");
                return false;
            }
        }
    </script>
    <div style="text-align: center;">
        <form id="verification_code_form" action="./validation/check_verification_code.php" method="post" onsubmit="return isvalidcode();">
            <input id="verification_code" name="verification_code" class="welcome_inputbox resetpassword_verification_input" placeholder="########" type="number">
            <input class="user_choose_button welcome_continue_button" value="Continue" type="submit">
        </form>
    </div>

</div>



</body>



</html>