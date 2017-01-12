<div>
	<div class="dboxheader dbox_head_profilecontactinfo">
		<div class="dboxtitle botmarg">
			Contact Information
		</div>
	</div>

	<!--//add list here...-->
	<div id="contact_info_item_container">

	</div>
	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new fields
		</div>
	</div>
	<select id="conatct_info_opt" name="feildName" class="edit_profile_contactinfo_item_fields">
		<?php
			$dist = "Web Site,GitHub,Email,Phone,Intagram,Twitter,YouTube,Pinchester,Tumbler,SoundCloud,LinkedIn,Skype,Blog,Facebook,Other";
			$ary = explode(',', $dist);
			foreach($ary as $dist){
			   echo "<option value='$dist'>$dist</option>";
			}
		?>
	</select><br>	
	<input id="new_contact_input" name="feildDetails" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value" Here="text"><br><br>
	<center><input type="button" onclick='insertContactInfo();' class="default_button edit_profile_contactinfo_add_button" value="Add field"></center>
</div>
