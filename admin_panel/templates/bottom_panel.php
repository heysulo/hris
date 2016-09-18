<div class="bottomPanel">
    <div style="float:left;height:80px;width:100%;">
        <div style="float:left;width:auto;height:100%;">
            <div class="txt_paneltitle">System Administration</div>

        </div>

    </div>
    <div class="group_main_menu">
        <ul>
            <li class="group_main_menu_item group_main_menu_item_active" id="main_menu_members" onclick="activate_tab(1);">Member Management</li>
            <li class="group_main_menu_item" id="main_menu_roles" onclick="activate_tab(2);">Role Management</li>
        </ul>
    </div>

    <div class="group_div_content" id="tab_roles">
        <div class="dbox group_tab_members group_members_dbox">


            <!-------------------------------ADD NEW ROLES--------------------------->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Add New System Role</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Enter Role Name"><br><br>
                    <table class="tg">
                        <tr>
                            <th class="tg-yw4l"></th>
                            <th class="tg-yw4l">Permission</th>
                            <th class="tg-yw4l">Power</th>
                            <th class="tg-yw4l">Power Needed</th>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Admin Panel Access</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                            <td class="tg-yw4l disabled_cell" colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Add Members</td>
                            <td class="tg-yw4l disabled_cell" rowspan="3"></td>
                            <td class="tg-yw4l">

                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Suspend Members</td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Meeting Request</td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Create Group</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                            <td class="tg-yw4l disabled_cell" colspan="2" rowspan="5"></td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Vision Power</td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Create Roles</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Change Roles</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Delete Roles</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button class="msgbox_button group_writer_button " onclick='closemsgbox();window.alert(";)");'>Create New Role</button>
                </div>
            </div>

            <!-------------------------------UPDATE ROLES--------------------------->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Update System Role</div>
                <div class="group_administration_content_field_value">
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <?php
                        $dist = "Public,Closed,Secret";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select><br><br>
                    <table class="tg">
                        <tr>
                            <th class="tg-yw4l"></th>
                            <th class="tg-yw4l">Permission</th>
                            <th class="tg-yw4l">Power</th>
                            <th class="tg-yw4l">Power Needed</th>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Admin Panel Access</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                            <td class="tg-yw4l disabled_cell" colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Add Members</td>
                            <td class="tg-yw4l disabled_cell" rowspan="3"></td>
                            <td class="tg-yw4l">

                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Suspend Members</td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Meeting Request</td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Create Group</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                            <td class="tg-yw4l disabled_cell" colspan="2" rowspan="5"></td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Vision Power</td>
                            <td class="tg-yw4l">
                                <input class="numud" type="number" name="quantity" min="0" max="100" step="5" value="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Create Roles</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Change Roles</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">Delete Roles</td>
                            <td class="tg-yw4l">
                                <div class="ui group_administration_checkbox">
                                    <input type="checkbox" class="ui group_administration_checkbox" >
                                    <label>Allow</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button class="msgbox_button group_writer_button yellow_button" onclick='closemsgbox();window.alert(";)");'>Update System Role</button>
                </div>
            </div>


            <!-------------------------------DELETE ROLES--------------------------->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Delete System Role</div>
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
                    <button class="msgbox_button group_writer_button red_button" onclick='closemsgbox();window.alert(";)");'>Delete System Role</button>
                </div>
            </div>

        </div>




    </div>


    <div class="group_div_content" id="tab_members">
        <div class="dbox group_tab_members group_members_dbox">


            <!-------------------------------ADD NEW MEMBERS--------------------------->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Add New Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="New Member's Email Address"><br>
                    <select id="conatct_info_opt" class="group_administration_dropdown">
                        <?php
                        $dist = "Student,Lecturer,Instructor";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>

                    <button class="msgbox_button group_writer_button " onclick='closemsgbox();window.alert(";)");'>Send Invitation</button>
                </div>
            </div>

            <!-------------------------------BULK ADD NEW MEMBERS--------------------------->
            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Bulk Invitation</div>
                <div class="group_administration_content_field_value">
                    <span style="font-size: 12px">Invite more than one member at a time by uploading a XLS file containing <br> member's email address</span><br>
                    <button class="msgbox_button group_writer_button " onclick='closemsgbox();window.alert(";)");'>Bulk Invitation</button>
                </div>
            </div>

            <!-------------------------------MEMBER MANAGEMENT--------------------------->

            <div class="group_administration_content_field">
                <div class="group_administration_content_field_name">Manage Member</div>
                <div class="group_administration_content_field_value">
                    <input type="text" class="group_administration_txtbox" placeholder="Member's Email Address">
                    <button class="msgbox_button group_writer_button " onclick='closemsgbox();window.alert(";)");'>Search Member by Email</button>
                    <br>

                    <?php include("./templates/selected_profile.php") ?>

                    <div style="clear: both;"></div>


                </div>
            </div>
        </div>
    </div>




</div>


<script>
    function activate_tab(x) {
        var tab_roles = document.getElementById("tab_roles");
        var tab_members = document.getElementById("tab_members");

        var main_menu_members = document.getElementById("main_menu_members");
        var main_menu_roles = document.getElementById("main_menu_roles");

        switch (x){
            case 2:
                tab_roles.style.display = "block";
                tab_members.style.display = "none";
                main_menu_members.className = "group_main_menu_item";
                main_menu_roles.className = "group_main_menu_item group_main_menu_item_active";
                break;
            case 1:
                tab_roles.style.display = "none";
                tab_members.style.display = "block";
                main_menu_members.className = "group_main_menu_item group_main_menu_item_active";
                main_menu_roles.className = "group_main_menu_item";
                break;

        }
    }

    activate_tab(1);
</script>