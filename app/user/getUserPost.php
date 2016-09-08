<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/8/16
 * Time: 10:28 AM
 */

$conn = null;
require_once("config.conf");
require_once ("../database/database.php");

if (isset($_GET['action'])){
    $user_id = $_GET['user_id'];
    $qry_to_get_group_id = "SELECT group_id FROM group_member WHERE member_id = '$user_id'";
    $resp = mysqli_query($conn,$qry_to_get_group_id);

    /*$row1 = mysqli_fetch_assoc($resp);
    $g_id = $row1['group_id'];*/

    while($row1 = mysqli_fetch_assoc($resp)){
        $qry_to_get_post = "SELECT * FROM group_post WHERE group_id = '".$row1['group_id']."' ORDER BY added_time DESC";
        $res = mysqli_query($conn,$qry);

        $row2 = mysqli_fetch_assoc($res);
        $ss = $row2['content'];

        echo "<p>  --> $ss // ".mysqli_error($conn)."c</p>";

        /*while ($row2 = mysqli_fetch_assoc($res)){
            //get posted person from each post
            $q = "SELECT first_name,last_name FROM member WHERE member_id='".$row['added_user_id']."'";
            $qres = mysqli_fetch_assoc(mysqli_query($conn,$q));

            //send html as respond to ajax request
            echo "<div class=\"newsfeed_item_box\" style = \"border-color:#$gcolor\">";
            echo "<div class=\"newsfeed_item_colorbar\" style=\"background-color:#$gcolor;border-radius: 2px\"></div>";
            echo "<div class=\"newsfeed_item_content\"><b>".$qres['first_name']." ".$qres['last_name']."</b> </br> " .$row['content']." </div>";
            echo "<div class=\"newsfeed_item_timestamp\">".$row['added_time']."</div>";
            echo "</div>";
        }*/
    }
}
