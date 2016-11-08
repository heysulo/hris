<div class="dbox profile_section_personal">
	<div class="dboxheader dbox_head_profile_personal">
		<div class="dboxtitle botmarg">
			Shared Information
		</div>
			
	</div>
	<div id="shared_info_container">
	<?php
		for($i = 0; $i < 5; ++$i) {
			include("personal_info_item.php");
		}
	?>
	</div>
	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new fields
		</div>
			
	</div>
	<select id="shared_info_opt" class="edit_profile_contactinfo_item_fields">
		<?php
			$dist = "School,Date of Birth,Stream,Religion,Office Location,A\L Stream,Political Views,Blog";
			$ary = explode(',', $dist);
			foreach($ary as $dist){
			   echo "<option value='$dist'>$dist</option>";
			}
		?>
	</select>
	<input id="input_shared_info" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text">
	<p>This information will be visible to people of this level and above</p>
	<select id="shared_info_opt" class="edit_profile_contactinfo_item_fields">
		<?php
		$dist = "Everyone,Students,Instructors,Lecturers";
		$ary = explode(',', $dist);
		foreach($ary as $dist){
			echo "<option value='$dist'>$dist</option>";
		}
		?>
	</select><br><br>
	<center><button onclick="insertsharedInfo()" class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
</div>

<script type="text/javascript">
	function insertsharedInfo() {
		var par = document.getElementById("shared_info_container");
		var opt = document.getElementById("shared_info_opt").value;
		var val = document.getElementById("input_shared_info").value;
		var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\"><div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div><div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'></div><div class=\"edit_profile_contactinfo_item_value\">"+val+"</div></div>"
		par.innerHTML += code;
	}
</script>