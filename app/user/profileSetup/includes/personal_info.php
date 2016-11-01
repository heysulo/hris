<div>
	<div class="dboxheader dbox_head_profile_personal">
		<div class="dboxtitle botmarg">
			Shared Information
		</div>
			
	</div>
	<div id="shared_info_container">
		<!--//LIst here-->
		<!--<div class="contact_info_item edit_profile_contactinfo_item">
			<div class="edit_profile_contactinfo_item_field">School :</div>
			<div class="edit_profile_contactinfo_item_remove" onclick='this.parentElement.outerHTML="";'></div>
			<div class="edit_profile_contactinfo_item_value">St. Aloysius' College, Galle</div>
		</div>-->
	</div>
	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new fields
		</div>
			
	</div>
	<select id="shared_info_opt" class="edit_profile_contactinfo_item_fields">
		<?php
			$dist = "School,Religion,Office Location,Blog,Web Site,";
			$ary = explode(',', $dist);
			foreach($ary as $dist){
			   echo "<option value='$dist'>$dist</option>";
			}
		?>
	</select><br>	
	<input id="input_shared_info" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center>
		<input type="button" onclick="insertsharedInfo()" class="default_button edit_profile_contactinfo_add_button" value="Add to Profile">
	</center>
</div>
