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
    <div class="group_div_content" id="tab_administration">Admin</div>
    <div class="group_div_content" id="tab_options">Settings</div>

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

