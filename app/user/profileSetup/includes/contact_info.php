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

			$query2 = "SELECT * FROM fields where category=1";
			$result = mysqli_query($conn,$query2);
			if (mysqli_num_rows($result)){
				while ($row_qt =  mysqli_fetch_assoc($result)){
					echo "<option value='".$row_qt['field_id']."'>".$row_qt['name']."</option>";
				}
			}
//			$dist = "GitHub,Email,Phone,Intagram,Twitter,YouTube,Pinchester,Tumbler,SoundCloud,LinkedIn,Skype,Blog,Facebook";
//			$ary = explode(',', $dist);
//			foreach($ary as $dist){
//			   echo "<option value='$dist'>$dist</option>";
//			}
		?>
	</select><br>	
	<input id="new_contact_input" name="feildDetails" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><input type="button" onclick='insertContactInfo();' class="default_button edit_profile_contactinfo_add_button" value="Add to Profile"></center>
</div>
