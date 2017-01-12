<?php
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

$conn = null;
require_once("../user/config.conf");
require_once("../database/database.php");
if (!isset($_SESSION['user_id'])){
    require_once ("../templates/refresher.php");
}
$count = 0;
$msg = null;
$icon = "notify_icon_date";
$nid = "";
$or_nid = "";
$action = 0;
$flag = 0;
while ($count == 0 && $flag < 2000){
    $qry = "SELECT * FROM notification WHERE unshown = 1 and member_id=".$_SESSION['user_id'];
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($res);
    $nid = "sys_pol_".$row['nid'];
    $or_nid = $row['nid'];
    $msg = $row['message'];
    $action = $row['action'];
    $count = mysqli_num_rows($res);
    $flag = $flag +1;
    //sleep(1);
}
if ($flag>= 2000){
    echo "timeout";
    die();
}
$qry = "UPDATE notification SET unshown=0 WHERE nid = $or_nid";
$res = mysqli_query($conn, $qry);
if (startsWith($action,"mr_")) { //meeting request
    ?>
    <li class="notification_item" id="<?php echo $nid; ?>">
        <div class="notification_bg">
            <div class="notify_icon notify_icon_date"></div>
            <div class="notify_close_button" onclick='clearnotification("<?php echo $nid; ?>")'></div>
            <div class="notify_content">
                <div class="dialog_notification_background">
                    <div class="dialog_notification_content">
                        <?php echo $msg; ?>
                    </div>
                    <div class="dialog_notification_button_area">
                        <input type="button" class="dialog_notification_button" value="Accept" onclick='acceptmeeting("<?php echo $or_nid; ?>","<?php echo $nid; ?>")'>
                        <input type="button" class="dialog_notification_button" value="Reshedule" onclick='reshedulemeeting("<?php echo $or_nid; ?>","<?php echo $nid; ?>")' >
                        <input type="button" class="dialog_notification_button" value="Reject" onclick='rejectmeeting("<?php echo $or_nid; ?>","<?php echo $nid; ?>")'>

                    </div>
                </div>
            </div>
        </div>
    </li>

    <?php
}elseif (startsWith($action,"ma_")){
    ?>
    <li class="notification_item" id="<?php echo $nid; ?>">
        <div class="notification_bg">
            <div class="notify_icon notify_icon_default"></div>
            <div class="notify_close_button" onclick='clearnotification("<?php echo $nid; ?>")'></div>
            <div class="notify_content">
                <?php echo $msg; ?>
            </div>
        </div>
    </li>
    
    <?php
    
}elseif (startsWith($action,"md_")){
    ?>
    <li class="notification_item" id="<?php echo $nid; ?>">
        <div class="notification_bg">
            <div class="notify_icon notify_icon_default"></div>
            <div class="notify_close_button" onclick='clearnotification("<?php echo $nid; ?>")'></div>
            <div class="notify_content">
                <?php echo $msg; ?>
            </div>
        </div>
    </li>

    <?php

}elseif (startsWith($action,"mc_")){
    ?>
    <li class="notification_item" id="<?php echo $nid; ?>">
        <div class="notification_bg">
            <div class="notify_icon notify_icon_date"></div>
            <div class="notify_close_button" onclick='clearnotification("<?php echo $nid; ?>")'></div>
            <div class="notify_content">
                <div class="dialog_notification_background">
                    <div class="dialog_notification_content">
                        <?php echo $msg; ?>
                    </div>
                    <div class="dialog_notification_button_area">
                        <input type="button" class="dialog_notification_button" value="Accept" onclick='acceptmeeting("<?php echo $or_nid; ?>","<?php echo $nid; ?>")'>
                        <input type="button" class="dialog_notification_button" value="Reshedule" onclick='reshedulemeeting("<?php echo $or_nid; ?>","<?php echo $nid; ?>")' >
                        <input type="button" class="dialog_notification_button" value="Reject" onclick='rejectmeeting("<?php echo $or_nid; ?>","<?php echo $nid; ?>")'>

                    </div>
                </div>
            </div>
        </div>
    </li>

    <?php

}else{
    echo "GG";
}

/*
 *
 */


/*
 *
 * <div id="dummynf" style="display: none">
    <li class="notification_item" id="nid_%nid%" >
        <div class="notification_bg">
            <div class="notify_icon <--icon-->"></div>
            <div class="notify_close_button" onclick='clearnotification("nid_%nid%")'></div>
            <div class="notify_content">
                %content%
            </div>
        </div>
    </li>
</div>*/
