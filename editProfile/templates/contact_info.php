<div class="dbox profile_section_contactinfo">
	<div class="dboxheader dbox_head_profilecontactinfo">
		<div class="dboxtitle botmarg">
			Contact Information
		</div>
			
	</div>
	<?php
		for($i = 0; $i < 10; ++$i) {
			include("contact_info_item.php");
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
			$dist = "GitHub,Email,Phone,Intagram,Twitter,YouTube,Pinchester,Tumbler,SoundCloud,LinkedIn,Skype,Blog,Facebook";
			$ary = explode(',', $dist);
			foreach($ary as $dist){
			   echo "<option value='$dist'>$dist</option>";
			}
		?>
	</select><br>	
	<input id="fname" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><button class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
</div>