<div class="dbox profile_section_personal">
	<div class="dboxheader dbox_head_profile_personal">
		<div class="dboxtitle botmarg">
			Shared Information
		</div>
			
	</div>
	<?php
		for($i = 0; $i < 5; ++$i) {
			include("personal_info_item.php");
		}
	?>

	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new fields
		</div>
			
	</div>
	<select class="edit_profile_contactinfo_item_fields">
		<?php
			$dist = "School,Date of Birth,Stream,Religion,Office Location,A\L Stream,Political Views,Blog";
			$ary = explode(',', $dist);
			foreach($ary as $dist){
			   echo "<option value='$dist'>$dist</option>";
			}
		?>
	</select><br>	
	<input id="fname" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><button class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
</div>