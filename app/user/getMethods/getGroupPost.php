<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/2/16
 * Time: 4:59 PM
 */

define('hris_access',true);
require_once('../../templates/path.php');
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email']) and !isset($_GET['group'])){
    header("location:../groups.php");
}else{
    //$gcolor = $_GET['c'];
    $gid = $_GET['group'];
    $userValid = $_GET['u'];
    $qry = "SELECT * FROM group_post WHERE group_id = '$gid' ORDER BY added_time DESC";
    $res = mysqli_query($conn,$qry);

    $valid_b = true;
    $valid = 'display:block';
    if($userValid == 000){
        $valid_b = false;
        $valid = 'display:none';
    }


    while ($row = mysqli_fetch_assoc($res)){
        //get posted person from each post
        $q = "SELECT first_name,last_name,profile_picture FROM member WHERE member_id='".$row['added_user_id']."'";
        $qres = mysqli_fetch_assoc(mysqli_query($conn,$q));
        $path_pro_pic = '../images/pro_pic/'.$qres['profile_picture'];
        $post_id = $row['post_id'];

        //Get group role
        $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT role FROM group_member WHERE member_id = '".$row['added_user_id']."' AND group_id= '$gid' "));
        $role = $sql['role'];

        //send html as respond to ajax request

        if($row['image'] == '0') {

            echo "<div class=\"dbox group_dbox_post\" id=\"$post_id\">
                <div class=\"group_post_head\">
                    <div class=\"group_post_user_image\" style=\"background-image: url('$path_pro_pic')\"></div>
                    <div class=\"group_post_head_content\">
                        <div class=\"group_post_head_user_name\">" . $qres['first_name'] . " " . $qres['last_name'] . "</div>
                        <div class=\"group_post_head_role\">" . $role . "</div>
                        <div class=\"group_post_head_timestamp\">" . $row['added_time'] . "</div>
                    </div>";
            if($valid_b){
                echo "
                    <div class=\"group_post_head_options\" style='$valid'>
                        <div class=\"group_post_head_options_item\" onclick='delete_post($post_id)'>Delete Post</div>
                    </div>";

            }
            echo "
                </div>
                <div class=\"group_post_content\">
                    " . $row['content'] . "
                </div>
            </div>";

        }else{
            echo "<div class=\"dbox group_dbox_post\">
                <div class=\"group_post_head\">
                    <div class=\"group_post_user_image\" style=\"background-image: url('$path_pro_pic')\"></div>
                    <div class=\"group_post_head_content\">
                        <div class=\"group_post_head_user_name\">" . $qres['first_name'] . " " . $qres['last_name'] . "</div>
                        <div class=\"group_post_head_role\">" . $role . "</div>
                        <div class=\"group_post_head_timestamp\">" . $row['added_time'] . "</div>
                    </div>";
            if($valid_b){
                echo "
                    <div class=\"group_post_head_options\" style='$valid'>
                        <div class=\"group_post_head_options_item\" onclick='delete_post($post_id)'>Delete Post</div>
                    </div>";

            }
            echo "
                </div>
                <div class=\"group_post_content\">
                    " . $row['content'] . "
                </div>
                <div class='post_image' style=\"background-image: url('../images/group/".$row['image']."\")'></div>
            </div>";
        }
    }
}