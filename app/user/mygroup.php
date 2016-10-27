<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
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
        $requestJoin = "display:none";
        if (!$memberDetails){
            $valid = "display:none;";
            $userValid = 000;
            $requestJoin = "display:block";
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
                <div id="num_member">1 Members</div><br>
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

            <!--Extra box for further dev-->
            <div class="dbox group_div_content_extra" style="<?php echo $requestJoin ?>">
                <center>
                    <p style="font-size: .8em">Join this group to see the discussion, post and comment.</p>
                    <button class="msgbox_button group_writer_button" id="joinGroup">Join Group</button>
                </center>

            </div>

            <div class="dbox group_div_content_extra" style="<?php echo $memberRequest ?>">

                <div class="group_role_title">New Request</div>
                <div id="request">
                    <!--<div class="dbox" style="height: 45px; padding-top: 0px; ">
                        <div class="group_member_facearea" style="margin: 5px">
                            <div class="group_member_face tooltip"><span class="tooltiptext">--</span> </div>
                        </div>
                        <div style="float: left; margin: 10px">
                            <button class="msgbox_button group_writer_button" id="acceptRequest">Accept</button>
                            <button class="msgbox_button group_writer_button red_button" id="ignoreRequest">Ignore</button>
                        </div>
                    </div>-->
                </div>
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

    <!--View current member-->
    <div class="group_div_content" id="tab_members">
        <div class="dbox group_tab_members group_members_dbox">
            <div class="group_tab_members_role">Members</div>
            <div class="group_tab_members_view_area">
                <div class="group_member_hd_box">
                    <div class="group_member_hd_propic"></div>
                    <div class="group_member_hd_name">Sulochana Kodituwakku</div>
                    <div class="group_member_hd_role">President</div>
                    <div class="group_member_hd_role">Computer Science</div>
                </div>

                <div style="clear: both;"></div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>


    <!--Group Administration panel-->
    <div class="group_div_content" id="tab_administration">
        <div class="dbox group_tab_members group_members_dbox">
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Group Name</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" name="group_name" value="<?php echo $group_detail['name']?>">
                </div>
            </div>
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Group Type</div>
                <div class="group_administration_content_field_value">
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <?php
                        $dist = "Community,Sports,Student Branch,Club,Society";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Group Privacy</div>
                <div class="group_administration_content_field_value">
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <?php
                        $dist = "Public,Closed,Secret";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Group Description</div>
                <div class="group_administration_content_field_value">
                    <textarea class="group_administration_textarea" placeholder="Describe this group"><?php echo $group_detail['description']; ?></textarea>
                </div>
            </div>

            <!--Group Roles Manage Area-->
            <div class="group_administration_content_field">
                
                <!--Create group Roles-->
                <form action="updateMethods/groupController.php" method="POST">
                    <div class="group_administration_content_field_name">Create Group Roles</div>
                    <div class="group_administration_content_field_value">
                        <div class="group_administration_content_field_value_sub">

                            <input type="text" name="role_name" class="group_administration_txtbox" placeholder="Enter Role Name" required>

                            <div class="ui group_administration_checkbox">

                                <label><input type="checkbox" name="createRole[]" value="1" class="ui group_administration_checkbox" >
                                Allow admin panel Access</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="2" class="ui group_administration_checkbox" >
                                Allow adding new members to the group</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="3" class="ui group_administration_checkbox" >
                                Allow removing members from the group</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="4" class="ui group_administration_checkbox" >
                                Allow changing roles of members</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="5" class="ui group_administration_checkbox" >
                                Allow group setting modifications</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="6" class="ui group_administration_checkbox" >
                                Allow group deletion</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="7" class="ui group_administration_checkbox" >
                                Allow user to post in the group</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="8" class="ui group_administration_checkbox" >
                                Allow user to delete posts in group</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="9" class="ui group_administration_checkbox" >
                                Allow user to pin/unpin posts</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="10" class="ui group_administration_checkbox" >
                                Allow user to send gorup messages via Email</label>
                            </div>

                            <div class="ui group_administration_checkbox">
                                <label><input type="checkbox" name="createRole[]" value="11" class="ui group_administration_checkbox" >
                                Allow user to Tweet</label>
                            </div>
                            <br>

                            <input type="hidden" value="<?php echo $group_id ?>" name="group_id">
                            <input type="submit" class="msgbox_button group_writer_button" name="create_role" id="create_role" value="Create New Role">
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </form>
            </div>


            <!--Delete Group Role -->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Delete Group Role</div>
                <div class="group_administration_content_field_value">
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <option value="">-- Select --</option>
                        <?php

                        $res_name = mysqli_query($conn,"SELECT role_name FROM group_role WHERE group_id = '$group_id' ");

                        while($row = mysqli_fetch_assoc($res_name)){
                            $dist = $row['role_name'];
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>

                    <button class="msgbox_button group_writer_button red_button" onclick='closemsgbox();window.alert(";)");'>Delete Group Role</button>
                </div>
            </div>

            <!--Update group Roles-->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Update Group Roles</div>
                <div class="group_administration_content_field_value">
                    <div class="group_administration_content_field_value_sub">
                        <select id="conatct_info_opt" class="group_administration_dropdown">
                            <option value="">-- Select --</option>
                            <?php

                            $res_name = mysqli_query($conn,"SELECT role_name FROM group_role WHERE group_id = '$group_id' ");

                            while($row = mysqli_fetch_assoc($res_name)){
                                $dist = $row['role_name'];
                                echo "<option value='$dist'>$dist</option>";
                            }
                            ?>
                        </select>
                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow admin panel Access</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow adding new members to the group</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow removing members from the group</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow changing roles of members</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow group setting modifications</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow group deletion</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow user to post in the group</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow user to delete posts in group</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow user to pin/unpin posts</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow user to send gorup messages via Email</label>
                        </div>

                        <div class="ui group_administration_checkbox">
                            <input type="checkbox" class="ui group_administration_checkbox" >
                            <label>Allow user to Tweet</label>
                        </div>
                        <br>
                        <button class="msgbox_button group_writer_button yellow_button" onclick='closemsgbox();window.alert(";)");'>Update Group Role</button>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>

            <!--Add new Memebers -->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Add New Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Enter Member Email">

                    <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Add Member</button>
                    <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Bulk Add</button>

                </div>
            </div>

            <!--Update Member area-->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Update Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Enter Member Email"><br>
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <?php
                        $dist = "President,Vice President,Secratory,Member";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>
                    <button class="msgbox_button group_writer_button yellow_button" onclick='closemsgbox();window.alert(";)");'>Update Member</button>

                </div>
            </div>


            <!--Update group Member area-->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Update Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Enter Member Email">
                    <button class="msgbox_button group_writer_button red_button" onclick='closemsgbox();window.alert(";)");'>Remove Member</button>

                </div>
            </div>

        </div>
    </div>


    <!--Group Option Panel-->
    <div class="group_div_content" id="tab_options">
        <div class="dbox group_tab_members group_members_dbox">

            <div class="group_tab_members_role">Group Settings</div><br>
            <div class="ui group_administration_checkbox">
                <input type="checkbox" class="ui group_administration_checkbox" >
                <label>Email me all the posts</label>
            </div><br>
            &nbsp;<button class="msgbox_button group_writer_button red_button" onclick='closemsgbox();window.alert(";)");'>Leave Group</button>
        </div>

    </div>


</div>

<?php
include_once('../templates/_footer.php');
?>
<!--Ajax method to get all post according to this group and show...-->
<script>
    $(document).ready(function () {
        //Update group post
        updateGroupPost();

        //updatea member request and member list
        updateMemberRequest();


    });

    //Function to update group post
    function updateGroupPost(){
        $.ajax({
            type:"GET",
            url:"getMethods/getGroupPost.php?group=<?php echo $group_id?>&c=<?php echo $group_detail['group_color']?>&u=<?php echo $userValid?>",
            success:function (response) {
                $('#group_post_content').html(response);
            }
        });
    }

    //Function to update group member and member requests list
    function updateMemberRequest(){
        //Get group members
        $.ajax({
            type:"GET",
            url:"getMethods/getGroupMembers.php?group=<?php echo $group_id?>&u=<?php echo $userValid?>",
            data:{'use':'sub'},
            success:function (response2) {
                $('.group_member_facearea').html(response2);
                var number_members = $('.group_member_facearea').size();
                $('#num_member').html(number_members + " Members ");
            }
        });

        $.ajax({
            type:"GET",
            url:"getMethods/getGroupMembers.php?group=<?php echo $group_id?>&u=<?php echo $userValid?>",
            data:{'use':'main'},
            success:function (response3) {
                $('.group_tab_members_view_area').html(response3);
            }
        });

        //Get new request
        $.ajax({
            type:"GET",
            url:"getMethods/getNewRequest.php?group=<?php echo $group_id?>&u=<?php echo $userValid?>",
            success:function (response4) {
                $('#request').html(response4);
            }
        });
    }

    //Delete group post function
    function delete_post(post_id) {
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

    //function to join group
    $('#joinGroup').click(function () {

        $.ajax({
            type:'POST',
            url:'updateMethods/joinGroup.php',
            data:{
                'user': '<?php echo $user_id ?>',
                'group':'<?php echo $group_id ?>'
            },
            dataType:'json',
            success:function (response) {
                if (response){
                    swal("Request send!", "Your request to join this group send.", "success");
                }else{
                    swal("Error", "Sorry, Your request not send!", "error");
                }
            }
        })

    });

    //Function to handle member request
    $('#request').on('click','.acceptRequest',function () {

        $.ajax({
            type:'POST',
            url:'updateMethods/groupController.php',
            data:{
                'request':'accept',
                'req_id': this.id,
                'group':'<?php echo $group_id ?>'
            },
            dataType:'json',
            success:function (response) {
                if (response){
                    swal("Member Add!", "New member added to group.", "success");
                    updateMemberRequest();
                }else{
                    swal("Error", "Sorry, member does not add!", "error");
                }
            }
        });
    });


</script>

<script>

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