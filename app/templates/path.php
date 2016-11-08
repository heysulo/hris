<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 7/31/16
 * Time: 1:28 PM
 */

defined('hris_access') or die(header("location:../../error.php"));
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

$publicPath = "http://".$_SERVER['HTTP_HOST']."/hris/public/";
$templatePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/";
$imagePath = "http://".$_SERVER['HTTP_HOST']."/hris/app/images";
$realtime_ping_path = "http://".$_SERVER['HTTP_HOST']."/hris/app/templates/ping.php";

?>

<script>

    function realtime_ping() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState ==4 && xhr.status == 200){
                //alert(xhr.responseText);
            }
        };
        xhr.open("POST", <?php echo "\"".$realtime_ping_path."\"" ?>, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();

    }
    var auto_refresh = setInterval(function() { realtime_ping() }, 5000);

</script>
