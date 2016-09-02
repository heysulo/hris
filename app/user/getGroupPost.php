<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/2/16
 * Time: 4:59 PM
 */

$conn = null;
require_once("config.conf");
require_once ("../database/database.php");
session_start();

if (!isset($_SESSION['email']) and !isset($_GET['group'])){
    header("location:groups.php");
}else{
    $gcolor = $_GET['c'];
    $gid = $_GET['group'];
    $qry = "SELECT * FROM group_post WHERE group_id = '$gid' ORDER BY added_time DESC";
    $res = mysqli_query($conn,$qry);

    while ($row = mysqli_fetch_assoc($res)){
        //get posted person from each post
        $q = "SELECT firstname,lastname FROM user WHERE userid='".$row['added_user_id']."'";
        $qres = mysqli_fetch_assoc(mysqli_query($conn,$q));

        //send html as respond to ajax request
        echo "<div class=\"newsfeed_item_box\" style = \"border-color:#$gcolor\">";
            echo "<div class=\"newsfeed_item_colorbar\" style=\"background-color:#$gcolor;border-radius: 2px\"></div>";
            echo "<div class=\"newsfeed_item_content\"><b>".$qres['firstname']." ".$qres['lastname']."</b> </br> " .$row['post_content']." </div>";
            echo "<div class=\"newsfeed_item_timestamp\">".$row['added_time']."</div>";
        echo "</div>";
    }
}