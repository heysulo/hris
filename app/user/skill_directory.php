<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['email'])){
        header("location:../../index.php");
    }

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];

    ?>
    <title>HRIS | Skill Directory</title>
</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
    <?php //include_once('../templates/bottom_panel.php'); ?>
</div>

<div class = "bottomPanel">
    <div class="txt_paneltitle">Undergraduate Transcript</div>
    <div class ="head_space"></div>
    <form name="transcript" method="post" class="basic-grey" action="getMethods/getTransPdf.php" onsubmit="return validateForm()">
        <table>
            <tr>
                <h1>Application for undergraduate transcript </h1></br></br>
                    <span class="error">* Required fields.</span>
            </tr>

            <tr>
                <td class="h">Full Name :</td>
                <td><input id="name" type="text" name="name" pattern="^[a-zA-Z ]*$" placeholder="Your full name" required/></td>
                <td class="error">* </td>
            </tr>

            <tr>
                <td class="h">Index no :</td>
                <td><input id="index" type="text" name="index" placeholder="1400XXXX" pattern="[0-9]{8}" required/></td>
                <td class="error">*</td>
            </tr>

            <tr>
                <td class="h">Registration no :</td>
                <td><input id="regno" type="text" name="regno" placeholder="2014CSXXX" pattern="[A-Za-z0-9]{9}" required/></td>
                <td class="error">* </td>
            </tr>

            <tr>
                <td class="h">Year :</td>
                <td><select name="year" required>
                        <option selected value="default">Please select an option.</option>
                        <option value=1 >first year</option>
                        <option value=2 >second year</option>
                        <option value=3 >third year</option>
                        <option value=4 >fourth year</option>
                    </select></td>
                <td class="error">*</td>
            </tr>

            <tr>
                <td class="h">&nbsp;</td>
                <td><input type="submit" class="button" value="Generate PDF" name="submit"/></td>
            </tr>

        </table>
    </form>
</div>


<?php
include_once('../templates/_footer.php');
?>

<script type="text/javascript">
    function validateForm()
    {
        var year = document.forms["transcript"]["year"].value;


        if (year == "default")
        {
            alert("Please select an Acaemic Year.");
            return false;
        }


    }
</script>

</body>
</html>