<?php
$conn = null;
require_once("config.conf");
require_once("../database/database.php");
$count = 0;
$msg = null;
$icon = "notify_icon_date";
$nid = 0;
while ($count == 0){
    $qry = "SELECT * FROM notification WHERE unshown = 1;";
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($res);
    $nid = $row['nid'];
    $msg = $row['message'];
    $count = mysqli_num_rows($res);

}
$qry = "UPDATE notification SET unshown=0 WHERE nid = $nid";
$res = mysqli_query($conn, $qry);
echo "{\"nid\":\"$nid\",\"msg\":\"$msg\",\"icon\":\"$icon\"}";