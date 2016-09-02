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
header("location:../../error.php");
if (!isset($_SESSION['email']) and !isset($_GET['group'])){
    header("location:groups.php");
}else{
    $gid = $_GET['group'];
    $qry = "SELECT * FROM group_post WHERE group_id = '$gid'";
    $res = mysqli_query($conn,$qry);
    $group_posts = array();
    while ($row = mysqli_fetch_assoc($res)){
        $group_posts.array_push($row);
    }

    json_encode($group_posts);
    echo $group_posts;

}