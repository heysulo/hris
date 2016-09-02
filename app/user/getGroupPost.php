<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/2/16
 * Time: 4:59 PM
 */

//defined('hris_access') or die(header("location:../../error.php"));

$conn = null;
require_once("config.conf");
require_once ("../database/database.php");
session_start();

if (!isset($_SESSION['email']) and !isset($_GET['group'])){
    header("location:groups.php");
}else{
    $gid = $_GET['group'];
    $qry = "SELECT * FROM group_post WHERE group_id = '$gid' ORDER BY added_time DESC";
    $res = mysqli_query($conn,$qry);
    $group_posts = array();
    /*while ($row = mysqli_fetch_assoc($res)){
        $group_posts.array_push($row);
    }
    //$group_posts = mysqli_fetch_assoc($res);
    json_encode($group_posts);
    echo $group_posts['post_content'];*/

    while ($row = mysqli_fetch_assoc($res)){
        //get posted person from each post
        $q = "SELECT firstname,lastname FROM user WHERE userid='".$row['added_user_id']."'";
        $qres = mysqli_fetch_assoc(mysqli_query($conn,$q));

        //send html as respond to ajax request
        echo "<div class=\"newsfeed_item_box\" style = \"border-color:\">";
            echo "<div class=\"newsfeed_item_colorbar\" style=\"background-color: \;border-radius: 2px\"></div>";
            echo "<div class=\"newsfeed_item_content\"><b>".$qres['firstname']." ".$qres['lastname']."</b> </br> " .$row['post_content']." </div>";
            echo "<div class=\"newsfeed_item_timestamp\">".$row['added_time']."</div>";
        echo "</div>";
    }
}