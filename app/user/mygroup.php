<!DOCTYPE html>
<head>
    <?php
    define("hris_access",true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("config.conf");
    require_once ("../database/database.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    if (!isset($_SESSION['email']) or !isset($_GET['group'])){
        header("location:../../index.php");
    }else{

        //get group id from GET method\
        $group_id = mysqli_real_escape_string($conn, $_GET['group']);

        $getGroupDetail = "SELECT * FROM groups WHERE group_id = '$group_id'";

        $res = mysqli_query($conn,$getGroupDetail);
        $group_detail = mysqli_fetch_assoc($res);
        $path = '../images/group/'.$group_detail['logo'];

        //get user type according to user
        $Qry_to_getUserType = "SELECT * FROM group_member WHERE member_id='$user_id' AND group_id='$group_id'";
        $memberDetails =mysqli_fetch_assoc(mysqli_query($conn, $Qry_to_getUserType));

        $userValid = 111;
        if (!$memberDetails){
            $valid = "display:none;";
            $userValid = 000;
        }


    }

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];


    //Submit post to database;
    if (isset($_POST['add_post']) && $_POST['post_content'] !=""){
        $post_content = $_POST['post_content'];
        $post_query = "INSERT INTO group_post(group_id,added_user_id,content,added_time) VALUES('$group_id','$user_id','$post_content',NOW())";

        $res = mysqli_query($conn,$post_query);
        if ($res){
            echo "<script>
                    //alert('Post add successfully.');
                    setTimeout(function () { 
                        swal(\"Success!\", \"New post added successfully.\", \"success\");
                    }, 1000);
                  </script>";
        }else{
            echo "<script>
                    setTimeout(function () { 
                        swal(\"Error\", \"Unable to add post!\", \"error\");    
                    }, 1000);
                    //alert('Sorry, Unable to add post.');
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

    <!--Main group details-->
    <div class="group_div_intro" style="border-left-color:<?php echo $group_detail['color']; ?> ">
        <div class="group_logo_box" style="background-image: url('<?php echo $path ?>')"></div>
        <div class="group_intro_content">
            <div class="group_name"><?php echo $group_detail['name']; ?></div>

            <div>
                <?php echo $group_detail['category']; ?> Group<br>
                12,232 Members<br>
            </div>
            <div class="group_short_description">
                <?php echo $group_detail['description']; ?>
            </div>

        </div>
    </div>

    <!--Navigation menu -->
    <div class="group_main_menu" style="<?PHP echo $valid ?>">
        <ul>
            <li class="group_main_menu_item group_main_menu_item_active" id="main_menu_notices" onclick="activate_tab(1);">Notices</li>
            <li class="group_main_menu_item" id="main_menu_members" onclick="activate_tab(2);">Members</li>
            <li class="group_main_menu_item" id="main_menu_administration"  onclick="activate_tab(3);">Administration</li>
            <li class="group_main_menu_item" id="main_menu_options" onclick="activate_tab(4);" >Group Options</li>
        </ul>
    </div>

    <!--Add new post and view current members.-->
    <div class="group_div_content" id="tab_notices">

        <!--add new post / file / photo-->
        <div class="group_div_content_post">
            <div class="dbox group_dbox_post"  style="<?php echo $valid?>">

                <div class="group_post_writer_navbar_area">
                    <ul class="group_post_writer_navbar">
                        <li class="group_post_writer_navbar_item group_post_writer_text">Write Post</li>
                        <li class="group_post_writer_navbar_item_seperator"></li>
                        <li class="group_post_writer_navbar_item group_post_writer_image">Add Photo</li>
                        <li class="group_post_writer_navbar_item_seperator"></li>
                        <li class="group_post_writer_navbar_item group_post_writer_file">Add File</li>
                    </ul>
                </div>
                <form action="" method="post">
                    <textarea name="post_content" class="group_post_writer_textarea" placeholder="Post your content here ...." required></textarea>
                    <div class="group_writer_bottom" align="right">
                        <input type="submit" name="add_post" value="Post" class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>
                    </div>
                </form>
            </div>

            <!--Show notification here-->
            <div id="group_post_content">
                <!--Sample data-->
                <div class="dbox group_dbox_post">
                    <div class="group_post_head">
                        <div class="group_post_user_image"></div>
                        <div class="group_post_head_content">
                            <div class="group_post_head_user_name">Group Admin</div>
                            <div class="group_post_head_role">Admin</div>
                            <div class="group_post_head_timestamp"></div>
                        </div>
                        <!--
                        <div class="group_post_head_options">
                            <div class="group_post_head_options_item">Delete Post</div>
                            <div class="group_post_head_options_item">Pin Post</div>
                            <div class="group_post_head_options_item">Ban Member</div>
                        </div>
                        -->
                    </div>
                    <div class="group_post_content">
                        This is a sapmle data.. IF you see this, that means you unable to get data from database.Please check your connection of complains to remalsha@gmail.com.
                    </div>
                </div>
            </div>

        </div>


        <div class="group_div_content_extra">
            <?php /*
            Add Member
            Remove Member
            Change Member Role

            Add Role
            Delete Role
            Manage Role

            Edit Group Name
            Edit Group Image
            Edit Description

            */?>

            <!--Extra box for further dev-->
            <div class="dbox group_div_content_extra">
            </div>

            <!--view group members area-->
            <div class="dbox group_div_content_extra">
                <div class="group_role_section">
                    <div class="group_role_title">Members</div>
                    <div class="group_member_facearea">
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <!--<div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>-->
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>


    <!--News feeds and notification area-->
    <!--<div class="dashboard_rightbox" style="width: 100%; margin-right: 20px;">
        <div class="dashboard_newsfeed dbox">
            <div class="dboxheader dbox_head_newsfeed">
                <div class="dboxtitle">
                    News Feed / Activity Feed
                </div>
                <div class="newsfeed_content">

                    <div class="newsfeed_item_box" style = "border-color:orangered;">
                        <div class="newsfeed_item_colorbar" style="background-color:orangered; border-radius: 2px"></div>
                        <div class="newsfeed_item_content">
                            This is a sapmle data.. IF you see this, that means you unable to get data from database.Please check your connection of complains to remalsha@gmail.com.
                        </div>
                        <div class="newsfeed_item_timestamp">Friday, September 2, 2016 at 9:32pm</div>
                    </div>

                </div>
            </div>
        </div>
    </div>-->

</div>

<?php
include_once('../templates/_footer.php');
?>
//Ajax method to get all post according to this group and show...
<script>
    $(document).ready(function () {
        //Update group post
        updateGroupPost();

        //Get group members
        $.ajax({
            type:"GET",
            url:"getMethods/getGroupMembers.php?group=<?php echo $group_id?>&u=<?php echo $userValid?>",
            success:function (response2) {
                $('.group_member_facearea').html(response2);
            }
        });
    });

    function updateGroupPost(){
        $.ajax({
            type:"GET",
            url:"getMethods/getGroupPost.php?group=<?php echo $group_id?>&c=<?php echo $group_detail['group_color']?>&u=<?php echo $userValid?>",
            success:function (response) {
                $('#group_post_content').html(response);
            }
        });
    }

    function delete_post(post_id) {
        console.log(post_id);
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this post!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){

                $.ajax({
                    type:"GET",
                    url:"updateMethods/deleteGroupPost.php?group=<?php echo $group_id?>&p=<?php echo $userValid?>&i="+post_id,
                    success:function (response) {
                        if(response){
                            swal("Deleted!", "Your post has been deleted.", "success");
                            updateGroupPost();
                        }else{
                            swal("Error", "Unable to delete post!", "error");
                        }
                    }
                });


            });

    }


    $('.newsfeed_content').on('click','.newsfeed_item_box',function () {
        var state = $(this).data('state');

        switch (state){
            case 1 :
            case undefined:
                $(this).css("max-height","1000px");
                $(this).css("height","100%");
                $(this).children('.newsfeed_item_colorbar').css("background-color","#4CAF50");
                $(this).data('state',2);
                break;
            case 2:
                $(this).css("max-height","70px");
                $(this).data('state',1);
                $(this).children('.newsfeed_item_colorbar').css("background-color","#<?php echo $group_detail['group_color']?>");
                break;
        }

    });

    function activate_tab(x) {
        var tab_notices = document.getElementById("tab_notices");
        var tab_members = document.getElementById("tab_members");
        var tab_administration = document.getElementById("tab_administration");
        var tab_options = document.getElementById("tab_options");

        var main_menu_notices = document.getElementById("main_menu_notices");
        var main_menu_members = document.getElementById("main_menu_members");
        var main_menu_administration = document.getElementById("main_menu_administration");
        var main_menu_options = document.getElementById("main_menu_options");

        switch (x){
            case 1:
                tab_notices.style.display = "block";
                tab_members.style.display = "none";
                tab_administration.style.display = "none";
                tab_options.style.display = "none";

                main_menu_notices.className = "group_main_menu_item group_main_menu_item_active";
                main_menu_members.className = "group_main_menu_item";
                main_menu_administration.className = "group_main_menu_item";
                main_menu_options.className = "group_main_menu_item";
                break;
            case 2:
                tab_notices.style.display = "none";
                tab_members.style.display = "block";
                tab_administration.style.display = "none";
                tab_options.style.display = "none";

                main_menu_notices.className = "group_main_menu_item ";
                main_menu_members.className = "group_main_menu_item group_main_menu_item_active";
                main_menu_administration.className = "group_main_menu_item";
                main_menu_options.className = "group_main_menu_item";
                break;
            case 3:
                tab_notices.style.display = "none";
                tab_members.style.display = "none";
                tab_administration.style.display = "block";
                tab_options.style.display = "none";

                main_menu_notices.className = "group_main_menu_item ";
                main_menu_members.className = "group_main_menu_item";
                main_menu_administration.className = "group_main_menu_item group_main_menu_item_active";
                main_menu_options.className = "group_main_menu_item";
                break;
            case 4:
                tab_notices.style.display = "none";
                tab_members.style.display = "none";
                tab_administration.style.display = "none";
                tab_options.style.display = "block";

                main_menu_notices.className = "group_main_menu_item ";
                main_menu_members.className = "group_main_menu_item";
                main_menu_administration.className = "group_main_menu_item";
                main_menu_options.className = "group_main_menu_item group_main_menu_item_active";
                break;
        }
    }

    activate_tab(1);
</script>

</body>
</html>