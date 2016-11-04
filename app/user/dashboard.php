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
        $user_id = $_SESSION['user_id'];
        $availability_status = $_SESSION['availability_status'];
        $availability_text = $_SESSION['availability_text'];

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
                <form action="basic_search.php" method="get">

                    <input type="text" name="search" placeholder="Search.." class="mainsearch" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
                </form>
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
            //Update news feed area
            $.ajax({
                type:"GET",
                url:"getMethods/getUserPost.php",
                data:{'action':'getPost',
                        'user_id':'<?php echo $user_id?>'},
                success:function (response) {
                    $('.newsfeed_content').html(response);
                }
            });

            //Update availability status
            $.ajax({
                type:"POST",
                url:"getMethods/getAvailabilityStatus.php",
                data:{'check':'get'},
                dataType:"json",
                success:function (response) {
                    //availability status updates...
                    var res = response['availability_status'];
                    //var val = res.split('_');
                    //var value = val[0];
                    var color = "#ffffff";
                    switch(res){
                        case "Available":
                            color = "#34a853";
                            break;
                        case "Away":
                            color = "#fbbc05";
                            break;
                        case "Busy":
                            color = "#ea4335";
                            break;
                        case "Lecture":
                            color = "#4285f4";
                            break;
                        default:
                            color = "#707070";
                            break;

                    }
                    $('#status_text').val(res);
                    $('.customstatus').css('border-left','4px solid '+color);
                    $('.customstatus').css('color',color);
                    $('.cur_availability_icon').css('background-color',color);
                    $('.cur_availability_icon').css('border','1px solid '+color);

                    //availability text update...
                    var text_res = response['availability_text'];
                    $('#status_text_2').val(text_res);
                }
            })

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

        // Availability drop down button
        $('.availability_button').on('click',function () {
            $('.availability_dropdown_content').toggle(".availability_dropdown_show");
        });

        //set availability function
        $('.availability_dropdown_content').on('click','.availability_dropdown_item',function () {
            var att_val = $(this).attr('id');
            var val = att_val.split('_');
            var value = val[0];
            var col = val[1];
            $('#status_text').val(value);
            $('.customstatus').css('border-left','4px solid '+col);
            $('.customstatus').css('color',col);
            $('.cur_availability_icon').css('background-color',col);
            $('.cur_availability_icon').css('border','1px solid '+col);

            //Update availability status
            $.ajax({
                type:"POST",
                url:"getMethods/getAvailabilityStatus.php",
                data:{'check':'set',
                        'msg':att_val},
                dataType:"json",
                success:function (res) {
                    if(!res){
                        alert('Sorry, Unable to set availability status.');
                    }
                }
            })

        });

        $('#set_btn').on('click',function () {
            var text = $('#status_text_2').val();

                //Update availability text
                $.ajax({
                    type:"POST",
                    url:"getMethods/getAvailabilityStatus.php",
                    data:{'check':'text_set',
                          'msg':text},
                    dataType:"json",
                    success:function (res) {
                        if(!res){
                            alert('Sorry, Unable to set availability status.');
                        }
                    }
                })

        });

    </script>
</body>
</html>
