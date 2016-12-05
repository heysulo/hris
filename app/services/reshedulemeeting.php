<?php sleep(3);?>
<!--        HTML CONTENT-->
<form id="frmreshedule" method="post">
<div class="msgbox_section_title">
    <div class="msgbox_title">Reshedule Meeting</div>
    <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
</div>
      <div style="margin: 20px;max-height: 450px;overflow: auto;">
          <div class="input_title">Subject</div><br>
          <input class="group_administration_txtbox" readonly placeholder="Subject for the Request" type="text" ><br><br>
          <div>
              <div style="width: 50%;height: 60px;float: left;">
                  <div class="input_title">Reshedule to Date</div><br>
                  <input style="width: 130px;" class="group_administration_txtbox" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" placeholder="2016-12-25" name="date" type="date"><br><br>
              </div>
              <div style="width: 50%;height: 60px;float: left;">
                  <div class="input_title">Time</div><br>
                  <input style="width: 130px;" class="group_administration_txtbox" required pattern="\b((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))" placeholder="12:00 PM" name="time" type="text"><br><br>
              </div>
          </div>
          <div class="input_title">Description</div><br>
          <textarea class="group_administration_txtbox" readonly placeholder="Add a amall description about what the meeting is about" maxlength="400" style="overflow:auto;resize:none;width:300px;height:140px;"></textarea><br>


      </div>
<div class="msgbbox_section_bottom" align="right">
    <button id="confirm_btn" class="msgbox_button msgbox_button_default" type="button" onclick="submitreshedule();">Confirm Changes</button>
    <button class="msgbox_button " onclick='document.getElementById("popupscreen").style.display = "none"'>Close</button>
</div>
</form>

<script id="ajaxedjs">
    
</script>
