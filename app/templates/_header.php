<?php
//define(A,true); this technique to prevent unauthorized access of file."

defined('hris_access') or die( header("location:../../error.php"));
?>
<meta charset="utf-8">
<meta name="Description" content="The Human Resource Information System is a place where you can access the shared information of the academic staff and the students of the University of Colombo School of Computing.">
<meta name="Keywords" content="HRIS,UCSC,University Students Information,Skill Directory">
<link rel='shortcut icon' href='/hris/favicon.ico' type='image/x-icon'/ >
<meta name="author" content="team helix">

<link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/artista.css">


<audio id="audio_notify" type="audio/ogg" src="<?php echo $publicPath?>audio/notify.ogg" preload="auto" autobuffer></audio>
<!--<link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">-->
<script src="<?php echo $publicPath?>js/msgbox_functions.js"></script>
<!--<link href='https://fonts.googleapis.com/css?family=Catamaran:400,200' rel='stylesheet' type='text/css'>
-->