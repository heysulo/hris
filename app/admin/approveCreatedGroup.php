
<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("config.conf");
    require_once ("../database/database.php");
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
<title>HRIS | Groups</title>
</head>
<body>
<div style="padding: 0px;">
    <?php //include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <div class="bottomPanel" style="height: 100%; width: 100%;">
        <div class="cbox">
            <div>REQUESTS FOR CREATED GROUPS</div>

                <div class="dbox" style="height: auto">
                    Student Emalsha created group ALIBABA

                    <div style="padding-left: 1em ;margin : 10px;">
                        Group Details:
                    </div>
                    <div style="margin-left: 2.5em ;float: left;width: 12px;height: 100px;background-color: #4080ff; border-radius: 3px"></div>
                    <div style="padding-left: 3em ;margin : 10px;">
                        <b>ALIBABA</b>
                    </div>
                    <div style="padding-left: 3em ;margin : 10px;">
                        Category
                    </div>
                    <div style="padding-left: 3em ;margin : 10px;">
                        Privacy
                    </div>
                    <div style="padding-left: 3em ;margin : 10px;">
                        Description here.
                    </div>
                    <div style="padding-left: 3em ;margin : 10px;">
                        Logo
                    </div>

                    <div style="column-span: 2"> <input type="submit" value="Approve" name="createGroup" class="green_btn" style="float: right; font-weight: 600"></div>
                </div>

        </div>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>