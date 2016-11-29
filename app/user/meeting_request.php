<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("./config.conf");
require_once("../database/database.php");
?>
    <div class="msgbox_section_title">
        <div class="msgbox_title">Request Meeting</div>
        <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
    </div>
    <div style="margin: 20px;max-height: 450px;overflow: auto;">
        <div class="input_title">Meeting Subject</div><br>
        <input class="group_administration_txtbox" placeholder="Subject for the Request" id="new_member_email" type="text"><br><br>
        <div class="input_title">Meeting Subject</div><br>
        <textarea class="group_administration_txtbox" placeholder="Subject for the Request" maxlength="1000" style="overflow:auto;resize:none;width:350px;height:200px;"></textarea><br>

        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        </script>
        Date: <input type="text" id="datepicker">
    </div>
    <div class="msgbbox_section_bottom" align="right">
        <button class="msgbox_button group_writer_button " id="btn_add_new_role" type="submit">Create New Role</button>
    </div>
</form>