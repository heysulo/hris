<?php

    $fname = $_SESSION['fname'];
    $mname = $_SESSION['mname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $img = $_SESSION['usr'];

    function getfullname(){
        global $fname,$lname;
        $full =  $fname . " " . $lname;
        return $full;
    }

?>
<div class="resetpassword_support_text">
    The following account matched with the email address you provided. Press continue to reset your password.
</div>
<div class="resetpassword_account_box">
    <img class="resetpassword_account_propic" src="../../images/pro_pic/<?php echo $img?>">
    <div>
        <span class="resetpassword_account_name"><?php echo getfullname();?></span>
        <br>
        <span class="resetpassword_account_role">Member of UCSC<br><?= $email;?></span>
    </div>
<!--    <div class="resetpassword_account_name">Allah Huakbar</div>-->
<!--    <br>-->
<!--    <div class="resetpassword_account_role">sulochana.456@live.com</div>-->
</div>
<div style="text-align: center;clear: both;">
    <form id="account_confirmed" action="./validation/code_generator.php">
        <input class="resetpassword_button_yesmyaccount"  value="Yes! This is my account" type="submit">
    </form>

    <form id="not_my_account" action="./password_reset.php">
        <input class="resetpassword_button_notmyaccount" value="No! This is not my account" type="submit">
    </form>
</div>

