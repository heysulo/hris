<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
require_once("../../templates/refresher.php");
$role_id = htmlspecialchars($_REQUEST['opt_box']);
$_SESSION['seletced_role_id'] = $role_id;
if (isset($_SESSION["system_admin_panel_access"])){
    $query1 = "SELECT * FROM system_role WHERE system_role_id = ".$role_id;
    $res1 = mysqli_query($conn,$query1);
    if (mysqli_num_rows($res1)==1 and $_SESSION['system_admin_panel_access']=="1"){
        $row = mysqli_fetch_assoc($res1);
        ?>
        <!--        HTML CONTENT-->
        <form id="updatesystemrole" method="post" action="administration_events/">
            <div class="msgbox_section_title">
                <div class="msgbox_title">Update System Role / <?php echo $row['name']; ?></div>
                <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
            </div>
            <div style="margin: 20px;max-height: 450px;overflow: auto;">
                Role Name : <input type="text" class="group_administration_txtbox" placeholder="Enter Role Name. Eg: Administrator" maxlength="15" pattern="[A-Za-z]{1,15}" name="txt_role_name" title="The role name should contain only letters" value="<?php echo $row['name']?>" required>
                <br><br>
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
                                <input type="checkbox" class="ui group_administration_checkbox" name="chk_admin_panel_access" <?php if($row['system_admin_panel_access']==1){echo "checked";}?>>
                                <label>Allow</label>
                            </div>
                        </td>
                        <td class="tg-yw4l disabled_cell" colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Add Members</td>
                        <td class="tg-yw4l disabled_cell" rowspan="5"></td>
                        <td class="tg-yw4l">

                            <input class="numud" type="number" name="txt_add_member_power" min="0" max="100" step="5" value="<?php echo $row['system_member_add_power'];?>">
                        </td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_add_member_power_needed" min="0" max="100" step="5" value="<?php echo $row['system_member_add_power_needed'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Suspend Members</td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_suspend_members_power" min="0" max="100" step="5" value="<?php echo $row['system_member_suspend_power'];?>">
                        </td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_suspend_members_power_needed" min="0" max="100" step="5" value="<?php echo $row['system_member_suspend_power_needed'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Meeting Request</td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_meeting_request_power" min="0" max="100" step="5" value="<?php echo $row['system_meeting_request_power'];?>">
                        </td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_meeting_request_power_needed" min="0" max="100" step="5" value="<?php echo $row['system_meeting_request_power_needed'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Member Change</td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_member_change_power" min="0" max="100" step="5" value="<?php echo $row['system_member_change_power'];?>">
                        </td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_member_change_power_needed" min="0" max="100" step="5" value="<?php echo $row['system_member_change_power_needed'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Member Delete</td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_member_delete_power" min="0" max="100" step="5" value="<?php echo $row['system_member_delete_power'];?>">
                        </td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_member_delete_power_needed" min="0" max="100" step="5" value="<?php echo $row['system_member_delete_power_needed'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Create Group</td>
                        <td class="tg-yw4l">
                            <div class="ui group_administration_checkbox">
                                <input type="checkbox" class="ui group_administration_checkbox" name="chk_create_group" <?php if($row['system_group_create_power']==1){echo "checked";}?>>
                                <label>Allow</label>
                            </div>
                        </td>
                        <td class="tg-yw4l disabled_cell" colspan="2" rowspan="5"></td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Vision Power</td>
                        <td class="tg-yw4l">
                            <input class="numud" type="number" name="txt_vision_power" min="0" max="100" step="5" value="<?php echo $row['system_vision_power'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Create Roles</td>
                        <td class="tg-yw4l">
                            <div class="ui group_administration_checkbox" >
                                <input type="checkbox" class="ui group_administration_checkbox" name="chk_create_system_roles" <?php if($row['system_add_system_role']==1){echo "checked";}?>>
                                <label>Allow</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Change Roles</td>
                        <td class="tg-yw4l">
                            <div class="ui group_administration_checkbox">
                                <input type="checkbox" class="ui group_administration_checkbox" name="chk_change_system_roles" <?php if($row['system_change_system_role']==1){echo "checked";}?>>
                                <label>Allow</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-yw4l">Delete Roles</td>
                        <td class="tg-yw4l">
                            <div class="ui group_administration_checkbox">
                                <input type="checkbox" class="ui group_administration_checkbox" name="chk_delete_system_roles" <?php if($row['system_delete_system_role']==1){echo "checked";}?>>
                                <label>Allow</label>
                            </div>
                        </td>
                    </tr>
                </table>


            </div>
        </form>
        <div class="msgbbox_section_bottom" align="right">
            <button id="confirm_btn" class="msgbox_button group_writer_button yellow_button" type="button">Confirm Changes</button>
            <button class="msgbox_button msgbox_button_default" onclick='document.getElementById("popupscreen").style.display = "none"'>Close</button>
            <script id="ajaxedjs2">
                //alert("proce");
                $("#confirm_btn").click(function(e) {

                    var url = "administration_events/updatesystemroleajaxed.php"; // the script where you handle the form input.

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#updatesystemrole").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            document.getElementById("popupscreen").style.display = "none";
                            //alert(data);
                            if (data=="success"){
                                msgbox("New permission settings for the system role <b><?php echo $row['name']; ?></b> has being saved successfully and will be taken into effect immediately.","System Role Updated",1);
                            }else if(data=="0x01"){
                                msgbox("Something went wrong. It appears to be that you don't have access to the administration panel","Permission Denied",3);

                            }else{
                                msgbox("Something went wrong and we are working on a solution for this error.","Unknown Error",3);

                            }
                        }
                    });

                    //e.preventDefault(); // avoid to execute the actual submit of the form.
                });
            </script>
        </div>






        <?php
    }else{
        echo "0";
    }
}else{
    echo "error";
}