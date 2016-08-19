<!DOCTYPE html>
<head>
    <?php
        define(hris_access,true);
        require_once('../templates/path.php');
        include('../templates/_header.php');
        session_start();

        if (!isset($_SESSION['email'])){
            header("location:../../index.php");
        }

        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $type  = $_SESSION['type'];
        $email = $_SESSION['email'];
        $pro_pic = $_SESSION['pro_pic'];

    ?>
    <title>HRIS | Dashboard</title>
</head>
<body>
    <!--Top pane and Navigation pane added here-->
    <div>
        <?php include_once('../templates/navigation_panel.php'); ?>
        <?php include_once('../templates/top_pane.php'); ?>
    </div>

    <!--Other content goes here-->
    <div class="bottomPanel">
        <div style="float:left;height:120px;width:100%;">
            <div style="float:left;width:auto;height:100%;">
                <div class="txt_paneltitle">Dashboard</div>
            </div>
            <div style="float:right;width:auto;height:100%;">
                <input type="text" name="search" placeholder="Search.." class="mainsearch">
            </div>
        </div>
        <?php include_once('../templates/bottom_panel.php'); ?>
    </div>


    <?php
        include_once('../templates/_footer.php');
    ?>
</body>
</html>
