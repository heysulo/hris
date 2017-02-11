<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/8/16
 * Time: 10:28 AM
 */

$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");

if (isset($_GET['action'])){
    $user_id = $_GET['user_id'];

    //New way to data get
    $sql = "SELECT GP.post_id,G.group_id,G.color,G.name,M.first_name,M.last_name,GP.content,GP.added_time FROM groups G,member M,group_post GP,group_member GM WHERE GM.member_id='$user_id' AND M.member_id=GP.added_user_id AND G.group_id = GP.group_id GROUP BY GP.post_id ORDER BY GP.added_time DESC";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res)){

        $p_id = $row['post_id'];
        $g_id = $row['group_id'];
        $g_color = $row['color'];
        $g_name = $row['name'];
        $f_name = $row['first_name'];
        $l_name = $row['last_name'];
        $content = $row['content'];
        $added_time = $row['added_time'];

        //send html as respond to ajax request
        echo "<div class=\"newsfeed_item_box\" id=\"$g_id\" name=\"$p_id\" style = \"border-color:$g_color\">";
        echo "<div class=\"newsfeed_item_colorbar\" style=\"background-color:$g_color;border-radius: 2px\"></div>";
        echo "<div class=\"newsfeed_item_content\"><b>".$g_name." (".$f_name." ".$l_name.")</b> </br> " .$content." </div>";
        echo "<div class=\"newsfeed_item_timestamp\">".$added_time."</div>";
        echo "</div>";
    }

    /*
    $qry_to_get_group_id = "SELECT group_id FROM group_member WHERE member_id = '$user_id'";
    $user_res = mysqli_query($conn,$qry_to_get_group_id);

    while($row1 = mysqli_fetch_assoc($user_res)){
        $qry_to_get_post = "SELECT * FROM group_post WHERE group_id = '".$row1['group_id']."' ORDER BY added_time DESC";
        $post_res = mysqli_query($conn,$qry_to_get_post);

        while ($row2 = mysqli_fetch_assoc($post_res)){
            //get posted person from each post
            $q = "SELECT first_name,last_name FROM member WHERE member_id='".$row2['added_user_id']."'";
            $qres = mysqli_fetch_assoc(mysqli_query($conn,$q));

            //get group color and group name for each post
            $q_color_name = "SELECT color,name FROM groups WHERE group_id='".$row1['group_id']."'";
            $g_response = mysqli_fetch_assoc(mysqli_query($conn,$q_color_name));
            $g_color = $g_response['color'];
            $g_name = $g_response['name'];

            // SELECT GP.post_id,G.color,G.name,M.first_name,M.last_name,GP.content,GP.added_time FROM groups G,member M,group_post GP,group_member GM WHERE GM.member_id='15' AND M.member_id=GP.added_user_id AND G.group_id = GP.group_id GROUP BY GP.post_id ORDER BY GP.added_time DESC;
            //send html as respond to ajax request
            echo "<div class=\"newsfeed_item_box\" style = \"border-color:$g_color\">";
            echo "<div class=\"newsfeed_item_colorbar\" style=\"background-color:$g_color;border-radius: 2px\"></div>";
            echo "<div class=\"newsfeed_item_content\"><b>".$g_name." (".$qres['first_name']." ".$qres['last_name'].")</b> </br> " .$row2['content']." </div>";
            echo "<div class=\"newsfeed_item_timestamp\">".$row2['added_time']."</div>";
            echo "</div>";
        }
    }
    */

}
