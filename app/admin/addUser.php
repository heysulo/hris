<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 8/26/16
 * Time: 5:40 PM
 */

?>

<!DOCTYPE>
<html>
<head>
    <?php
    define(hris_access,true);
    require_once('../templates/path.php');?>
    <title>HRIS | PUBLIC USER</title>
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/artista.css">
</head>
<body>

<div class="clearfix">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php //include_once('../templates/top_pane.php'); ?>
    <?php //include_once('../templates/bottom_panel.php'); ?>

</div>



<script src="<?php echo $publicPath?>js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $publicPath?>js/side_panel.js"></script>

</body>
</html>


