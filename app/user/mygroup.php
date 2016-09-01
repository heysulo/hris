<!DOCTYPE html>
<head>
    <?php
    define(hris_access,true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("config.conf");
    require_once ("../database/database.php");
    session_start();

    if (!isset($_SESSION['email']) and !isset($_GET['group'])){
        header("location:../../index.php");
    }else{

        //get group id from GET method\
        $group_id = mysqli_real_escape_string($conn, $_GET['group']);

        $getGroupDetail = "SELECT * FROM groups WHERE group_id = '$group_id'";

        $res = mysqli_query($conn,$getGroupDetail);
        $group_detail = mysqli_fetch_assoc($res);


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
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>


    </div>
<!--Other content goes here-->
<div class="bottomPanel">
    <!--Title and search box area-->
    <div style="float:left;height:80px;width:100%;">
        <div style="float:left;width:auto;height:100%;">
            <div class="txt_paneltitle"><?php echo $group_detail['g_name']; ?></div>
        </div>
        <div style="float:right;width:auto;height:100%;">
            <input type="text" name="search" placeholder="Search groups " class="mainsearch">
        </div>
    </div>

    <div class="dbox">
        <div class="dboxheader ">
            <div class="dboxtitle">
                Group Details
            </div>

        </div>
    </div>

    <!--News feeds and notification area-->
    <div class="dashboard_rightbox" style="width: 100%; margin-right: 20px;">
        <div class="dashboard_newsfeed dbox">
            <div class="dboxheader dbox_head_newsfeed">
                <div class="dboxtitle">
                    News Feed / Activity Feed
                </div>
                <div class="newsfeed_content">
                    <?php


                    for ($x = 0; $x <= 40; $x++) {
                         if ($x % 2 == 1){
                            $color = "2ecc71";
                        }else{
                            $color = "34495e";
                        }
                        include('../templates/news_feed_items.php');
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>