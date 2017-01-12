<?php defined('hris_access') or die(header("location:../../error.php")); ?>

<div class="dashboard_bottom">
    <div class="dashboard_leftbox">

        <!--availability status box-->
        <div >
            <?php include_once('box_availability_status.php'); ?>
        </div>

        <!--Notification area-->
        <div class="dbox notification_box">
            <div class="dboxheader dbox_head_request">
                <div class="dboxtitle">
                    Meeting Requests
                </div>
                <div id="mt_elem_box" class="notification_elem_box">
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


                </div>
                <script>
                    function meeting_indepth(mid) {
                        //alert(mid);
                        var xhr = new XMLHttpRequest();
                        var popupscreen = document.getElementById("popupscreen");
                        var dimmer = document.getElementById("popup_dimmer");
                        var popupcontentareax = document.getElementById("popup_content_area");
                        var animation = document.getElementById("ajaxloadinganimation");
                        popupcontentareax.innerHTML = animation.innerHTML;
                        popupscreen.style.display="block";
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState ==4 && xhr.status == 200){
                                var popupcontentarea = document.getElementById("popup_content_area");
                                popupcontentarea.innerHTML = xhr.responseText;
                                popupscreen.style.display="block";
                                dimmer.style.backgroundColor="#000000";
                            }
                        };
                        xhr.open("POST", "<?php echo $server_folder?>meeting_mgr.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.send("mid="+mid);
                    }

                    function update_mt_elem_box() {
                        //alert(mid);
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState ==4 && xhr.status == 200){
                                var mt_mgr = document.getElementById("mt_elem_box");
                                mt_mgr.innerHTML = this.responseText;

                            }
                        };
                        xhr.open("POST", "update_mt_mgr.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.send();
                    }

                    function mt_mgr_accept(mid) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState ==4 && xhr.status == 200){
                                switch(this.responseText){
                                    case "success":
                                        msgbox("Meeting request accepted.","Request Accepted",1);
                                        break;
                                    default:
                                        msgbox("Error occured while attempting to accept the meeting request. Please try again shortly","Error Occured",3);
                                        break;
                                }
                                meeting_indepth(mid);
                                update_mt_elem_box();
                            }
                        };
                        xhr.open("POST", "<?php echo $server_folder?>mt_mgr_accept.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.send("mid="+mid);
                    }

                    function mt_mgr_reject(mid) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState ==4 && xhr.status == 200){
                                switch(this.responseText){
                                    case "success":
                                        msgbox("Meeting request rejected.","Request Rejected",1);
                                        break;
                                    default:
                                        msgbox("Error occured while attempting to reject the meeting request. Please try again shortly","Error Occured",3);
                                        break;
                                }
                                meeting_indepth(mid);
                                update_mt_elem_box();
                            }
                        };
                        xhr.open("POST", "<?php echo $server_folder?>mt_mgr_reject.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.send("mid="+mid);
                    }

                    function mt_mgr_delete(mid) {
                        var xhr = new XMLHttpRequest();
                        var popupscreen = document.getElementById("popupscreen");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState ==4 && xhr.status == 200){
                                switch(this.responseText){
                                    case "success":
                                        msgbox("Meeting request deleted.","Request Deleted",1);
                                        break;
                                    default:
                                        msgbox("Error occured while attempting to delete the meeting request. Please try again shortly","Error Occured",3);
                                        break;
                                }
                                popupscreen.style.display="none";
                                update_mt_elem_box();
                            }
                        };
                        xhr.open("POST", "<?php echo $server_folder?>mt_mgr_delete.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.send("mid="+mid);
                    }
                </script>
            </div>
        </div>

        <div class="dbox notification_box">
            <div class="dboxheader dbox_head_request">
                <div class="dboxtitle">
                    Meeting Requests
                </div>
                <div class="notification_content">
                    <div class="request-tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#all_request">All Request</a></li>
                            <li><a href="#meeting">Meeting</a></li>
                            <li><a href="#information">Information</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="all_request" class="tab active">
                                <p>All Requests listed in here.</p>
                                <p></p>
                            </div>
                            <!----------------------------------->
                            <div id="meeting" class="tab">
                                <p>All meeting schedules shows here.</p>
                            </div>
                            <!----------------------------------->
                            <div id="information" class="tab">
                                <p>Some information shows here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!--News feed and activity feed -->
<div class="dashboard_rightbox">
    <div class="dashboard_newsfeed dbox">
        <div class="dboxheader dbox_head_newsfeed">
            <div class="dboxtitle">
                News Feed / Activity Feed
            </div>
            <div class="newsfeed_content">
                <!--implementaions -->
                <div class="newsfeed_item_box" style = "border-color:orangered;">
                    <div class="newsfeed_item_colorbar" style="background-color:orangered; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        This is a sapmle data.. IF you see this, that means you unable to get data from database.Please check your connection or complains to remalsha@gmail.com.
                    </div>
                    <div class="newsfeed_item_timestamp">Friday, September 2, 2016 at 9:32pm</div>
                </div>

            </div>
        </div>
    </div>
</div>
