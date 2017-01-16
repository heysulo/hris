<!DOCTYPE html>
<head>
    <?php
        require_once('./templates/path.php');
        include('./templates/_header.php');
    ?>
    <title>HRIS | Public User</title>
</head>
<body>
    <!--Top pane and Navigation pane added here-->
    
    <div>
        <?php include_once('./templates/navigation_panel.php'); ?>
        <?php include_once('./templates/top_pane.php'); ?>
    </div>

    <!--Other content goes here-->
    <div class="bottomPanel">
        <!--Title and search box area-->
        <div class="view_public_header">
            <div class="txt_paneltitle">Search UCSC Undergraduates</div>
        </div>


        <!--content goes here-->
        <div class="clearfix" style="margin-top: 0;">

            <div class="bottomPanel">

                    <div class="group_main_menu">
                        <ul>
                            <li class="group_main_menu_item group_main_menu_item_active" id="main_menu_members" onclick="activate_tab(1);">Search By Name</li>
                            <li class="group_main_menu_item" id="main_menu_roles" onclick="activate_tab(2);">Search By Skill</li>
                        </ul>
                    </div>

                    <div class="group_div_content" id="tab_roles">
                        <div class="dbox group_tab_members group_members_dbox">




                    <!-- ---------------------------------------- Batch details adding ---------------------------------->

                    <div class="group_div_content" id="tab_batch">
                        <div class="dbox group_tab_members group_members_dbox">

                            <?php if($_SESSION['system_member_add_power']){?>

                                <div class="group_administration_content_field">
                                    <div class="group_administration_content_field_name">Batch Detail </div>
                                    <dvi class="group_administration_content_field_value">

                                        <button class="msgbox_button group_writer_button" name="batchFunction" onclick="window.location.replace('/hris/app/admin/batchFunction.php')">Batch Functions</button>
                                    </dvi>
                                </div>
                                <div class="group_administration_content_field">
                                    <div class="group_administration_content_field_name">Academic Detail</div>
                                    <dvi class="group_administration_content_field_value">

                                        <button class="msgbox_button group_writer_button" name="academicFunction" onclick="window.location.replace('/hris/app/admin/academicFunction.php')">Academic Functions</button>
                                    </dvi>
                                </div>
                            <?php }?>


                            <?php
                            if(!($_SESSION['system_member_change_power'] || $_SESSION['system_member_add_power'])){
                                echo "You dont have any member management permissions";
                            }
                            ?>
                        </div>
                    </div>







            </div>



            <script>
                function activate_tab(x) {
                    var tab_roles = document.getElementById("tab_roles");
                    var tab_members = document.getElementById("tab_members");
                    var tab_batch = document.getElementById("tab_batch");

                    var main_menu_members = document.getElementById("main_menu_members");
                    var main_menu_roles = document.getElementById("main_menu_roles");
                    var main_menu_batch = document.getElementById("main_menu_batch");

                    switch (x){
                        case 2:
                            tab_roles.style.display = "block";
                            tab_members.style.display = "none";
                            tab_batch.style.display = "none";
                            main_menu_members.className = "group_main_menu_item";
                            main_menu_roles.className = "group_main_menu_item group_main_menu_item_active";
                            main_menu_batch.className = "group_main_menu_item";
                            break;
                        case 1:
                            tab_roles.style.display = "none";
                            tab_members.style.display = "block";
                            tab_batch.style.display = "none";
                            main_menu_members.className = "group_main_menu_item group_main_menu_item_active";
                            main_menu_roles.className = "group_main_menu_item";
                            main_menu_batch.className = "group_main_menu_item";
                            break;
                        case 3:
                            tab_roles.style.display = "none";
                            tab_members.style.display = "none";
                            tab_batch.style.display = "block";
                            main_menu_batch.className = "group_main_menu_item group_main_menu_item_active";
                            main_menu_members.className = "group_main_menu_item";
                            main_menu_roles.className = "group_main_menu_item";
                            break;

                    }
                }

                activate_tab( <?php echo $active?>);
            </script>
        </div>

    </div>


    <?php
        include_once('./templates/_footer.php');
    ?>
</body>
</html>
