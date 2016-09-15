<div class="bottomPanel">

    <div class="group_div_intro">
        <div class="group_logo_box"></div>
        <div class="group_intro_content">
            <div class="group_name">Computer Science Society</div>
            
            <div>
                Public Community Group<br>
                12,232 Members<br>
            </div> 
            <div class="group_short_description">
                The University of Colombo Gavel Club is affiliated to Toastmasters International USA and was chartered in October 2014. The main objectives of the club are to develop communication, presentation and leadership skills among the undergraduates.
            </div>
            
        </div>
    </div>
    <div class="group_main_menu">
        <ul>
            <li class="group_main_menu_item group_main_menu_item_active" id="main_menu_notices" onclick="activate_tab(1);">Notices</li>
            <li class="group_main_menu_item" id="main_menu_members" onclick="activate_tab(2);">Members</li>
            <li class="group_main_menu_item" id="main_menu_administration"  onclick="activate_tab(3);">Administration</li>
            <li class="group_main_menu_item" id="main_menu_options" onclick="activate_tab(4);" >Group Options</li>
        </ul>
    </div>
    <div class="group_div_content" id="tab_notices">
        <div class="group_div_content_post">
            <div class="dbox group_dbox_post">

                <div class="group_post_writer_navbar_area">
                    <ul class="group_post_writer_navbar">
                        <li class="group_post_writer_navbar_item group_post_writer_text">Write Post</li>
                        <li class="group_post_writer_navbar_item_seperator"></li>
                        <li class="group_post_writer_navbar_item group_post_writer_image">Add Photo</li>
                        <li class="group_post_writer_navbar_item_seperator"></li>
                        <li class="group_post_writer_navbar_item group_post_writer_file">Add File</li>
                    </ul>
                </div>

                <textarea class="group_post_writer_textarea" placeholder="Post your content here ...."></textarea>
                <div class="group_writer_bottom" align="right">

                    <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Continue</button>

                </div>
            </div>

            <?php
                for ($i=0;$i<20;$i++){
                    include("./templates/post.php");
                }

            ?>
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

            <div class="dbox group_div_content_extra">

            </div>

            <div class="dbox group_div_content_extra">

                <div class="group_role_section">
                    <div class="group_role_title">Members</div>
                    <div class="group_member_facearea">
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>
                        <div class="group_member_face tooltip"><span class="tooltiptext">Sulochana Kodituwakku</span> </div>

                    </div>
                    <br>
                </div>
            </div>
        </div>


    </div>
    <div class="group_div_content" id="tab_members">
        <div class="dbox group_tab_members group_members_dbox">
            <div class="group_tab_members_role">President</div>
            <div class="group_tab_members_view_area">
                <?php
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    include ("member_hd.php");
                    ?>

                <div style="clear: both;"></div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <div class="group_div_content" id="tab_administration">
        <div class="dbox group_tab_members group_members_dbox">
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Group Name</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox">
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
                    <textarea class="group_administration_textarea" placeholder="Describe this group"></textarea>
                </div>
            </div>
            <!-
            //\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
            /////////////////////////////////////////////////////////////////////////////////// Member Management/\
            //\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
            ->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Create Group Roles</div>
                <div class="group_administration_content_field_value">
                    <div class="group_administration_content_field_value_sub">
                        <input type="text" class="group_administration_txtbox" placeholder="Enter Role Name">
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
                        <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Create New Role</button>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>


            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Delete Group Role</div>
                <div class="group_administration_content_field_value">
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <?php
                        $dist = "President,Vice President,Secratory,Member";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>

                    <button class="msgbox_button group_writer_button red_button" onclick='closemsgbox();window.alert(";)");'>Delete Group Role</button>
                </div>
            </div>

            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Update Group Roles</div>
                <div class="group_administration_content_field_value">
                    <div class="group_administration_content_field_value_sub">
                        <select id="conatct_info_opt" class="group_administration_dropdown">
                            <?php
                            $dist = "President,Vice President,Secratory,Member";
                            $ary = explode(',', $dist);
                            foreach($ary as $dist){
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

            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Add New Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Enter Member Email">

                    <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Add Member</button>
                    <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Bulk Add</button>

                </div>
            </div>


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


            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Update Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Enter Member Email">
                    <button class="msgbox_button group_writer_button red_button" onclick='closemsgbox();window.alert(";)");'>Remove Member</button>

                </div>
            </div>

        </div>
    </div>
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

