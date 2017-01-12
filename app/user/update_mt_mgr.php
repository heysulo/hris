<?php
$conn = null;
require_once("../user/config.conf");
require_once ("../database/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$mid = $_SESSION['user_id'];
$query = "SELECT * FROM meeting JOIN member on target_id = $mid and member_id = source_id union SELECT * FROM meeting JOIN member on source_id = $mid and member_id = target_id ORDER BY date ASC, time ASC";
$res = mysqli_query($conn,$query);
if (mysqli_num_rows($res)){
    while ($row_qt =  mysqli_fetch_assoc($res)){
        $sender = null;
        if ($row_qt['source_id'] == $mid){
            $sender = $row_qt['target_id'];
        }else{
            $sender = $row_qt['source_id'];
        }
        $subject_dd = $row_qt['subject'];
        $name_full = $row_qt['first_name']." ".$row_qt['last_name'];
        $meeting_dt = $row_qt['date']." at ".$row_qt['time'];
        $span_class = "None";
        $span_txt = "None";
        switch ($row_qt['status']){
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

        <div class="notification_content">
            <div class="meeting_request_element" onclick="meeting_indepth(<?=$row_qt['meeting_id']?>)">
                <img style="width: 80px;background-color: #00ee00;height: 80px;float: left;" src="../images/pro_pic/<?php echo $row_qt['profile_picture']?>">
                <div style="width: calc(100% - 200px);height: 60px;float: left;">
                    <div class="met_req_name"><?= $name_full?></div>
                    <div class="met_req_field">Date & Time : <?=$meeting_dt?></div>
                    <div class="met_req_field">Subject : <?= $subject_dd?></div>
                    <div class="met_req_field">Status : <span class="<?=$span_class?>"><?=$span_txt?></span> </div>
                </div>


            </div>
        </div>
    <?php }
}else{
    ?><div class="met_req_name" style="text-align: center;margin: 5px;">No Meetings Scheduled</div><?php
}?>