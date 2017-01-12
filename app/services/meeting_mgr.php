<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("./config.conf");
require_once("../database/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$mid = $_POST['mid'];
$my_id = $_SESSION['user_id'];
$query = "SELECT * FROM meeting JOIN member on target_id = $my_id and member_id = source_id and meeting_id = $mid union SELECT * FROM meeting JOIN member on source_id = $my_id and member_id = target_id and  meeting_id = $mid;";
$res = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($res);
$span_class = "None";
$span_txt = "None";
switch ($row['status']){
    case 1:
        $span_class = "req_status_txt_active";
        $span_txt = "Active";
        break;
    case 2:
        $span_class = "req_status_txt_canceled";
        $span_txt = "Rejected";
        break;
    case 3:
        $span_class = "req_status_txt_resheduled";
        $span_txt = "Resheduled";
        break;
    case 4:
        $span_class = "req_status_txt_canceled";
        $span_txt = "Canceled";
        break;
    case 0:
        $span_class = "req_status_txt_pending";
        $span_txt = "Pending Approval";
        break;
    default:
        $span_class = "req_status_txt_canceled";
        $span_txt = "Undefiened";
        break;


}
?>
<form id="frmMeetingRequest" method="post" action="meetingsubmit.php" style="margin: 0;min-width: 500px;">
    <div class="msgbox_section_title">
        <div class="msgbox_title">Manage Meeting Request</div>
        <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
    </div>
    <div style="margin: 25px;max-width: 500px;">
        <div class="meeting_request_element">
            <img style="width: 80px;background-color: #00ee00;height: 80px;float: left;" src="../images/pro_pic/<?php echo $row['profile_picture']?>">
            <div style="width: calc(100% - 200px);height: 60px;float: left;">
                <div class="met_req_name"><?=$row['first_name'].' '.$row['last_name']?></div>
                <div class="met_req_field">Date & Time : <?=$row['date'].' '.$row['time']?></div>
                <div class="met_req_field">Subject : <?=$row['subject']?></div>
                <div class="met_req_field">Status : <span class="<?=$span_class?>"><?=$span_txt?></span> </div>
            </div>


        </div>
        <br>
        <div style="margin-bottom: 15px">
            <div class="met_req_name"><?=$row['subject']?></div>
            <?=$row['description']?>
        </div>





    </div>
    <div class="msgbbox_section_bottom" align="right">
        <?php if($row['status'] ==0){?><input type="button" value="Accept" class="msgbox_button group_writer_button"><?php }?>
        <?php if($row['status'] ==0 or $row['status'] ==1 or $row['status'] ==3){?><input type="button" value="Reject" class="msgbox_button red_button"><?php }?>
        <?php if($row['status'] !=2 and $row['status'] !=4  ){?><input type="button" value="Reshedule" class="msgbox_button blue_button"><?php }?>
        <?php if($row['status'] !=0 ){?><input type="button" value="Completed" class="msgbox_button yellow_button"><?php }?>

    </div>
</form>