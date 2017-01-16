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
        <div class="clearfix" style="margin-top: 10px;">

            <div class="bottomPanel" style="padding-top: 0">

                    <div class="group_main_menu">
                        <ul>
                            <li class="group_main_menu_item group_main_menu_item_active" id="main_menu_members" onclick="activate_tab(1);">Search By Name</li>
                            <li class="group_main_menu_item" id="main_menu_roles" onclick="activate_tab(2);">Search By Skill</li>
                        </ul>
                    </div>





                    <!-- ---------------------------------------- Batch details adding ---------------------------------->

                    <div class="group_div_content" id="tab_name">
                        <div class="dbox group_tab_members group_members_dbox">
                            <form>
                                <p class="pub_box_help">
                                    Search the undergraduates of University of Colombo School of Computing by their name and view and download the Curriculum Vitae they have provided to the Human Resource Information System
                                    <br><br>
                                    <input type="text" id="pw" name="name" class="welcome_inputbox" placeholder="Enter Undergraduate Name" required style="width: 500px;"><br>
                                    <input class="user_choose_button welcome_continue_button" value="Continue" type="button" id="step1">
                                </p>
                            </form>


                        </div>
                    </div>

                    <div class="group_div_content" id="tab_skill">
                        <div class="dbox group_tab_members group_members_dbox">
                            <form>
                                <p class="pub_box_help">
                                    Search the undergraduates of University of Colombo School of Computing by skills like Java,Python..etc and view and download the Curriculum Vitae of the undergraduates who are interested or capable of those technologies or skills
                                    <br><br>
                                </p>
                                <div id="skill_item_container" class="skill_cont">
                                    <!--// item added here...
                                </div>-->
                                    <!--<div class="skill_item">
                                        <!--<div class="edit_profile_contactinfo_item_remove_skill" onclick='this.parentElement.outerHTML=""'></div>-->
                                    <div style="clear: both"></div>
                                </div><br>
                                <p class="pub_box_help">


                                <input type="text" id="new_skill_input" name="name" class="welcome_inputbox" placeholder="Enter Skill name and hit Enter" style="width: 500px;" onkeypress="checkenter(event);"><br>
                                <input class="user_choose_button welcome_continue_button" value="Search" type="button">
                            </form>


                        </div>
                    </div>







            </div>

            <script>

                function checkenter(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode == 13) {
                        e.preventDefault();
                        insertSkill();
                    }
                }



                function insertSkill() {
                    var par = document.getElementById("skill_item_container");
                    var val = document.getElementById("new_skill_input").value;
                    if (val !="") {
                        var code = "<div class=\"skill_item\">" +
                            "<div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\">" +
                            "</div>" + val + "<input type='hidden' class='blank_skill' value='" + val + "'></div>";
                        par.innerHTML += code;
                        document.getElementById("new_skill_input").value = "";
                    }
                    var s = document.getElementById("skill_list");
                    var x = document.getElementsByClassName("blank_skill");
                    var i;
                    s.value = "";
                    for (i = 0; i < x.length; i++) {
                        s.value += x[i].value + ";";
                    }
                    //
                }
            </script>



            <script>
                function activate_tab(x) {
                    var tab_name = document.getElementById("tab_name");
                    var tab_skill = document.getElementById("tab_skill");
                    var main_menu_members = document.getElementById("main_menu_members");
                    var main_menu_roles = document.getElementById("main_menu_roles");
                    var main_menu_batch = document.getElementById("main_menu_batch");

                    switch (x){
                        case 2:
                            tab_skill.style.display = "block";
                            tab_name.style.display = "none";
                            main_menu_members.className = "group_main_menu_item";
                            main_menu_roles.className = "group_main_menu_item group_main_menu_item_active";
                            break;
                        case 1:
                            tab_skill.style.display = "none";
                            tab_name.style.display = "block";
                            main_menu_members.className = "group_main_menu_item group_main_menu_item_active";
                            main_menu_roles.className = "group_main_menu_item";
                            break;


                    }
                }

                activate_tab(1);
            </script>
        </div>

    </div>


    <?php
        include_once('./templates/_footer.php');
    ?>
</body>
</html>
