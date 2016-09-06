<html>
<head>
    <title>USER </title>

    <?php
    define(hris_access,true);
    require_once('../../templates/path.php');
    include('../../templates/_header.php');
    session_start();
    ?>
</head>

<body class="welcome_body">

<div class="welcome_top_gradient"></div>

<div class="welcome_section_banner">
    Welcome to HRIS UCSC !
</div>
<div id="res">
    <div id="content">
        <script>
            var step = 1;
        </script>

        <div class="dbox welcome_section_maindbox">
            <?php include ("./template/steps.php"); ?>
            <div class="welcome_section_introtxt">

                Welcome to Human Resource Information System of University of Colombo School of Computing. Please create a password for your account in order to continue.
            </div>
            <div align="center">
                <input type="password" id="fname" name="firstname" class="welcome_inputbox" placeholder="Enter Password"><br>
                <input type="password" id="fname" name="firstname" class="welcome_inputbox" placeholder="Re-Enter Your Password"><br>
                <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="next1">
            </div>
        </div>
    </div>
</div>



<?php
include_once('../../templates/_footer.php');
?>
<script>

    $(document).ready(function () {
        $('#next1').click(function () {
           $.ajax({
                url:"step2.php",
                type:'post',
                success:function (data) {
                    $('#content').hide();
                    $('#content').html(data);
                }
           });
        });



    });

</script>

</body>

</html>