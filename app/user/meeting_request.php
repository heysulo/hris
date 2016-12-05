<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("./config.conf");
require_once("../database/database.php");
?>
<form id="frmMeetingRequest" method="post" action="meetingsubmit.php" style="margin: 0;">
    <div class="msgbox_section_title">
        <div class="msgbox_title">Request Meeting</div>
        <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
    </div>
    <div style="margin: 20px;max-height: 450px;overflow: auto;">
        <div class="input_title">Subject</div><br>
        <input class="group_administration_txtbox" required placeholder="Subject for the Request" name="subject" type="text" ><br><br>
        <div>
            <div style="width: 50%;height: 60px;float: left;">
                <div class="input_title">Date</div><br>
                <input style="width: 130px;" class="group_administration_txtbox" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" placeholder="2016-12-25" name="date" type="date"><br><br>
            </div>
            <div style="width: 50%;height: 60px;float: left;">
                <div class="input_title">Time</div><br>
                <input style="width: 130px;" class="group_administration_txtbox" pattern="\b((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))" placeholder="12:00 PM" name="time" type="text"><br><br>
            </div>
        </div>
        <div class="input_title">Description</div><br>
        <textarea class="group_administration_txtbox" required placeholder="Add a amall description about what the meeting is about" maxlength="400" style="overflow:auto;resize:none;width:300px;height:140px;" name="description"></textarea><br>


    </div>
    <div class="msgbbox_section_bottom" align="right">
        <button class="msgbox_button group_writer_button " id="sumbit_meeting" type="submit" onsubmit="submitmeeting(3);">Submit Request</button>
    </div>
</form>