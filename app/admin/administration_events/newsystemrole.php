<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
?>
<form id="new_system_role_table" method="post" action="administration_events/newsystemroleajax.php" style="margin-bottom: 0px">
<div class="msgbox_section_title">
    <div class="msgbox_title">Add New System Role</div>
    <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
</div>
<div style="margin: 20px;max-height: 450px;overflow: auto;">
    Role Name : <input type="text" class="group_administration_txtbox" placeholder="Enter Role Name. Eg: Administrator" maxlength="15" pattern="[A-Za-z]{1,15}" name="txt_role_name" title="The role name should contain only letters" required>
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
                    <input type="checkbox" class="ui group_administration_checkbox" name="chk_admin_panel_access" >
                    <label>Allow</label>
                </div>
            </td>
            <td class="tg-yw4l disabled_cell" colspan="2"></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Add Members</td>
            <td class="tg-yw4l disabled_cell" rowspan="5"></td>
            <td class="tg-yw4l">

                <input class="numud" type="number" name="txt_add_member_power" min="0" max="100" step="5" value="10">
            </td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_add_member_power_needed" min="0" max="100" step="5" value="10">
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Suspend Members</td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_suspend_members_power" min="0" max="100" step="5" value="10">
            </td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_suspend_members_power_needed" min="0" max="100" step="5" value="10">
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Meeting Request</td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_meeting_request_power" min="0" max="100" step="5" value="10">
            </td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_meeting_request_power_needed" min="0" max="100" step="5" value="10">
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Member Change</td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_member_change_power" min="0" max="100" step="5" value="10">
            </td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_member_change_power_needed" min="0" max="100" step="5" value="10">
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Member Delete</td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_member_delete_power" min="0" max="100" step="5" value="10">
            </td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_member_delete_power_needed" min="0" max="100" step="5" value="10">
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Create Group</td>
            <td class="tg-yw4l">
                <div class="ui group_administration_checkbox">
                    <input type="checkbox" class="ui group_administration_checkbox" name="chk_create_group" >
                    <label>Allow</label>
                </div>
            </td>
            <td class="tg-yw4l disabled_cell" colspan="2" rowspan="5"></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Vision Power</td>
            <td class="tg-yw4l">
                <input class="numud" type="number" name="txt_vision_power" min="0" max="100" step="5" value="10">
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Create Roles</td>
            <td class="tg-yw4l">
                <div class="ui group_administration_checkbox">
                    <input type="checkbox" class="ui group_administration_checkbox" name="chk_create_system_roles">
                    <label>Allow</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Change Roles</td>
            <td class="tg-yw4l">
                <div class="ui group_administration_checkbox">
                    <input type="checkbox" class="ui group_administration_checkbox" name="chk_change_system_roles">
                    <label>Allow</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l">Delete Roles</td>
            <td class="tg-yw4l">
                <div class="ui group_administration_checkbox">
                    <input type="checkbox" class="ui group_administration_checkbox" name="chk_delete_system_roles">
                    <label>Allow</label>
                </div>
            </td>
        </tr>
    </table>


</div>
<div class="msgbbox_section_bottom" align="right">

    <button class="msgbox_button group_writer_button " id="btn_add_new_role" type="submit">Create New Role</button>
    <script id="ajaxedjsx">
        //alert("SSS");
        $("#btn_add_new_role").click(function(e) {

            var url = "administration_events/newsystemroleajax.php"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#new_system_role_table").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    document.getElementById("popupscreen").style.display = "none";
                    //alert(data);
                    if (data=="success"){
                        msgbox("The new system role has being created and available for use.","System Role Created",1);
                    }else if(data=="0x1"){
                        msgbox("Something went wrong. It appears to be that you don't have access to the administration panel","Permission Denied",3);

                    }else{
                        msgbox("Something went wrong and we are working on a solution for this error.","Unknown Error",3);

                    }
                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    </script>
</div>
</form>