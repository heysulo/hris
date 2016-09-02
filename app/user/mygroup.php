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
    $user_id = $_SESSION['user_id'];

    //Submit post to database;
    if (isset($_POST['add_post']) && $_POST['post_content'] !=""){
        $post_content = $_POST['post_content'];
        $post_query = "INSERT INTO group_post(group_id,added_user_id,post_content,added_time) VALUES('$group_id','$user_id','$post_content',NOW())";
        $res = mysqli_query($conn,$post_query);

        if ($res){
            echo "<script>
                    alert('Post add successfully.');
                  </script>";
        }else{
            echo "<script>
                    alert('Sorru unable to add post.');
                  </script>";
        }

    }





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

    <div>
    <!--Group details-->
    <div class="dbox" style="margin-top: 80px; width: 40%; margin-left: 20px;">
        <div class="dboxheader ">
            <div class="dboxtitle">
                Group Details
            </div>
            <div>
                <p><?php echo $group_detail['g_name'] ?></p>
                <p><?php echo $group_detail['g_description'] ?></p>
                <p><?php echo $group_detail['g_category'] ?></p>
            </div>

        </div>
    </div>

    <!--Add news of notification to group-->
    <div class="dbox" style="margin-top: 20px; width: 40%; margin-left: 20px;">
        <div class="dboxheader ">
            <div class="dboxtitle">
                Add News Feed or Notification
            </div>
            <div>
                <form action="" method="post">
                    <input type="text" name="post_content" style="padding: 8px; border-radius: 3px; border:1px solid midnightblue; width: 80%;" required>
                    <input type="submit" name="add_post" value="POST">
                </form>
            </div>

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
                    /*for ($x = 0; $x <= 40; $x++) {
                         if ($x % 2 == 1){
                            $color = "2ecc71";
                        }else{
                            $color = "34495e";
                        }
                        include('../templates/news_feed_items.php');
                    }*/
                    ?>

                    <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                        <div class="newsfeed_item_colorbar" style="background-color:#<?= $color;?> ; border-radius: 2px"></div>
                        <div class="newsfeed_item_content">

                        </div>
                        <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                    </div>
                    <div class="newsfeed_item_box" style = "border-color:">
                        <div class="newsfeed_item_colorbar" style="background-color: ;border-radius: 2px"></div>
                        <div class="newsfeed_item_content">hello hello hello </div>
                        <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>
<script>
    $(document).ready(function () {
        $.ajax({
            type:"GET",
            url:"getGroupPost.php?group=<?php echo $group_id?>",
            //dataType:"json",
            success:function (response) {
                //alert("data tika gatta..");
                //$(".newsfeed_content").appendChild(".newsfeed_item_box").$('.newsfeed_item_content').val(response[0][2]);
                $('.newsfeed_content').html(response);
            }
        });
    })
</script>

</body>
</html>