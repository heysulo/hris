<!DOCTYPE html>
<head>
    <?php
        define('hris_access',true);
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
        $user_id = $_SESSION['user_id'];


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
        <!--Title and search box area-->
        <div style="float:left;height:80px;width:100%;">
            <div style="float:left;width:auto;height:100%;">
                <div class="txt_paneltitle">Dashboard</div>
            </div>
            <div style="float:right;width:auto;height:100%;">
                <input type="text" name="search" placeholder="Search.." class="mainsearch">
            </div>
        </div>

        <!--content goes here-->
        <?php include_once('../templates/bottom_panel.php'); ?>

    </div>


    <?php
        include_once('../templates/_footer.php');
    ?>

    <!--Ajax method to get all post according to this group and show...-->
    <script>
        $(document).ready(function () {
            $.ajax({
                type:"GET",
                url:"getUserPost.php",
                data:{'action':'getPost',
                        'user_id':'<?php echo $user_id?>'},
                success:function (response) {
                    $('.newsfeed_content').html(response);
                }
            });
        });


        $('.newsfeed_content').on('click','.newsfeed_item_box',function () {
            var state = $(this).data('state');
            var color = $(this).children('.newsfeed_item_colorbar').css("background-color");
            switch (state){
                case 1 :
                case undefined:
                    $(this).css("height","100%");
                    $(this).css("max-height","500px");
                    $(this).children('.newsfeed_item_colorbar').css("background-color","#4CAF50");
                    $(this).data('state',2);
                    break;
                case 2:
                    $(this).css("max-height","70px");
                    $(this).data('state',1);
                    $(this).children('.newsfeed_item_colorbar').css("background-color",color);
                    break;
            }

        });

    </script>
</body>
</html>
