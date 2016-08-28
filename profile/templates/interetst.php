<div class="dbox profile_section_interests">
	<div class="dboxheader dbox_head_profile_interetst">
		<div class="dboxtitle botmarg">
			Skills & Intrests
		</div>
	</div>
	<div>
		<?php
			$str =  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.";    
			$ary = explode(' ', $str);
			foreach($ary as $str){
			   include("skill_item.php");
			}
		?>


	<?php include("skill_item.php") ?>
	<?php include("skill_item.php") ?>
	<?php include("skill_item.php") ?>
	<?php include("skill_item.php") ?>
	<?php include("skill_item.php") ?>
	<?php include("skill_item.php") ?>
	</div>
</div>