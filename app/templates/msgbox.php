<span id="msgbox">
<?php 
	$buttonclass = "msgbox_button msgbox_button_default";
	$dimcolor = "000";
	switch ($_REQUEST['type']){
		case 1:
			$buttonclass = "msgbox_button group_writer_button";
			break;
		case 2:
			$buttonclass = "msgbox_button group_writer_button yellow_button";
			$dimcolor="fcb42e";
			break;
		case 3:
			$buttonclass = "msgbox_button group_writer_button red_button";
			$dimcolor="ff0000";
			break;
		default:
			$buttonclass = "msgbox_button msgbox_button_default";
			break;
	}

?>
<div class="msgbox_background">
	<div class="msgbox_section_title">
		<div class="msgbox_title"><?php echo $_REQUEST["title"]?></div>
		<div class="msgbox_close_button" onclick='closemsgbox()'></div>
	</div>
	<div class="msgbox_section_content">
		<p>
			<?php echo $_REQUEST["body"]?>
		</p>
	</div>
	<div class="msgbbox_section_bottom" align="right">
		<?php
			if($_REQUEST['btn_default_txt']=="undefined"){
				?>
				<button class="<?php echo $buttonclass;?>" onclick='closemsgbox();<?php if($_REQUEST['def_function']!="undefined"){ echo "window[\"".$_REQUEST['def_function']."\"]()";} ?>'>Okay</button>
				<?php
			}else{
				?>
				<button class="<?php echo $buttonclass;?>" onclick='closemsgbox();<?php if($_REQUEST['def_function']!="undefined"){echo "window[\"".$_REQUEST['def_function']."\"]()";} ?>'><?php echo $_REQUEST['btn_default_txt'] ?></button>
				<?php
			}
		?>

		<?php
		if($_REQUEST['btn_optional_txt']!="undefined") {
			?>
			<button class="msgbox_button" onclick='closemsgbox();<?php if($_REQUEST['opt_function']=="undefined"){echo "closemsgbox()";}else{echo "window[\"".$_REQUEST['opt_function']."\"]()";} ?>'><?php echo $_REQUEST['btn_optional_txt'] ?></button>
			<?php
		}
		?>



	</div>


	
</div>

<div class="msgbox_dimmer" style='background-color:#<?php echo $dimcolor;?>'>

</div>
</span>