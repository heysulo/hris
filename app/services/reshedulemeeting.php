
<!--        HTML CONTENT-->
<?php
sleep(1);
$conn = null;
require_once("./config.conf");
require_once("../database/database.php");
require_once("../templates/refresher.php");
//session_start();
$qry = "SELECT * FROM notification WHERE nid=".$_REQUEST['nid']." and member_id=".$_SESSION['user_id'];
$res = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($res);
@$meetingid = explode("_",$row['action'])[1];
$qry = "SELECT * FROM meeting JOIN member on meeting_id = $meetingid and member_id = source_id";
$res = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($res);
if($row['source_id']!=$_SESSION['user_id']){
    $qry = "SELECT * FROM meeting JOIN member on meeting_id = $meetingid and member_id = source_id";
}else{
    $qry = "SELECT * FROM meeting JOIN member on meeting_id = $meetingid and member_id = target_id";
}
$res = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($res);
?>
<form id="frmreshedule" method="post" style="margin: 0;">
<div class="msgbox_section_title">
    <div class="msgbox_title">Reshedule Meeting</div>
    <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
</div>
      <div style="margin: 20px;max-height: 450px;overflow: auto;min-width: 320px;min-height: 80px;max-width: 320px;overflow: hidden;">
          <div class="input_title" style="text-align: center;margin-bottom: 20px;">
              <?php if($row['source_id']!=$_SESSION['user_id']){?>
             Reshedule your meeting with <a href="../user/member.php?id=<?php echo $row['member_id'];?>" target="_blank"><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></a> on the subject <?php echo $row['subject'];?>
            <?php }else{?>
                  Reshedule your meeting with <a href="../user/member.php?id=<?php echo $row['member_id'];?>" target="_blank"><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></a> on the subject <?php echo $row['subject'];?>
              <?php } ?>
          </div>

          <div>
              <div style="width: 50%;height: 60px;float: left;">
                  <div class="input_title">Reshedule to Date</div><br>
                  <input style="width: 130px;" class="group_administration_txtbox" required value="<?php echo $row['date'];?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" placeholder="2016-12-25" name="date" type="date"><br><br>
              </div>
              <div style="width: 50%;height: 60px;float: left;">
                  <div class="input_title">Time</div><br>
                  <input style="width: 130px;" class="group_administration_txtbox" required value="<?php echo $row['time'];?>" pattern="\b((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))" placeholder="12:00 PM" name="time" type="text" value="<?php echo $meetingid;?>"><br><br>
              </div>
          </div>



      </div>
<div class="msgbbox_section_bottom" align="right">
    <button id="confirm_btn" class="msgbox_button msgbox_button_default" type="button" onclick="submitreshedule(<?php echo $meetingid;?>);">Confirm Changes</button>
    <button type="button" class="msgbox_button " onclick='document.getElementById("popupscreen").style.display = "none"'>Close</button>
</div>
</form>

<script id="ajaxedjs">
    
</script>
