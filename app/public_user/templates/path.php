<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 7/31/16
 * Time: 1:28 PM
 */
/*
if ($_SERVER['HTTP_HOST'] == 'localhost'){
    $publicPath = "http://".$_SERVER['HTTP_HOST']."/hris/public/";
    $templatePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/";
    $imagePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/images";
}else{
    $publicPath = "http://".$_SERVER['HTTP_HOST']."/public/";
    $templatePath = "http://".$_SERVER['HTTP_HOST']."/app/templates/";
    $imagePath = "http://".$_SERVER['HTTP_HOST']."/app/images";
}*/
/*
$publicPath = "http://".$_SERVER['HTTP_HOST']."/hris/public/";
$templatePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/";
$imagePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/images";*/

$appPath = "http://".$_SERVER['HTTP_HOST']."/hris/app/";
$publicPath = "http://".$_SERVER['HTTP_HOST']."/hris/public/";
$templatePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/";
$imagePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/images";
$realtime_ping_path = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/ping.php";
$server_folder = "http://".$_SERVER['HTTP_HOST']."/hris/app/services/";

if ($_SERVER['HTTP_HOST'] == 'localhost'){
    $appPath = "http://".$_SERVER['HTTP_HOST']."/hris/app/";
    $publicPath = "http://".$_SERVER['HTTP_HOST']."/hris/public/";
    $templatePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/";
    $imagePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/images";
    $realtime_ping_path = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/ping.php";
    $server_folder = "http://".$_SERVER['HTTP_HOST']."/hris/app/services/";
}else{
    $appPath = "http://".$_SERVER['HTTP_HOST']."/app/";
    $publicPath = "http://".$_SERVER['HTTP_HOST']."/public/";
    $templatePath = "http://".$_SERVER['HTTP_HOST']."/app/templates/";
    $imagePath = "http://".$_SERVER['HTTP_HOST']."/app/images";
    $realtime_ping_path = "http://".$_SERVER['HTTP_HOST']."/app/templates/ping.php";
    $server_folder = "http://".$_SERVER['HTTP_HOST']."/app/services/";

}


?>
