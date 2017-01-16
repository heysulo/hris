<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 10/12/16
 * Time: 7:39 AM
 */

$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email']) and !isset($_GET['group'])){
    header("location:../groups.php");
}else {

        $gid = $_GET['group'];
        $userValid = $_GET['u'];
        $qry = "SELECT member_id,request_id FROM group_member_request WHERE group_id = '$gid' ORDER BY request_date DESC";
        $res = mysqli_query($conn, $qry);

        if ($userValid == 000) {
            $valid = 'display:none';
        }


        while ($row = mysqli_fetch_assoc($res)) {
            //get users from each db
            $q = "SELECT first_name,last_name,profile_picture FROM member WHERE member_id='" . $row['member_id'] . "'";
            $qres = mysqli_fetch_assoc(mysqli_query($conn, $q));
            $path_pro_pic = '../images/pro_pic/' . $qres['profile_picture'];

            //send html as respond to ajax request
            //echo "<div class=\"group_member_face tooltip\" style='background-image: url(\" " . $path_pro_pic . " \");'><span class=\"tooltiptext\">" . $qres['first_name'] . " " . $qres['last_name'] . "</span> </div>";

            echo "<div class=\"dbox\" style=\"height: 45px; padding-top: 0px; border-radius: 2px; margin-bottom: -8px; \">
                    <div class=\"group_member_facearea\">
                        <div class=\"group_member_face tooltip\" style=\"background-image: url( " . $path_pro_pic . " ); \"><span class=\"tooltiptext\">".$qres['first_name']." ".$qres['last_name']."</span> </div>
                    </div>
                    <div style=\"float: left; margin: 10px\">
                        <button class=\"msgbox_button group_writer_button acceptRequest\" id=\"". $row['request_id'] . "\">Accept</button>
                        <button class=\"msgbox_button group_writer_button red_button ignoreRequest  \" name='".$row['request_id']."' id=\"". $row['request_id'] ."\">Ignore</button>
                    </div>
                </div>";
        }
}