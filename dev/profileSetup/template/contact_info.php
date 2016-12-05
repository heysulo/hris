<div>
	<div class="dboxheader dbox_head_profilecontactinfo">
		<div class="dboxtitle botmarg">
			Contact Information
		</div>
			
	</div>
	<div id="contact_info_item_container">
	<?php
		for($i = 0; $i < 10; ++$i) {
			include("contact_info_item.php");
		}
	?>
	</div>
	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new fields
		</div>
			
	</div>
	<select id="conatct_info_opt" class="edit_profile_contactinfo_item_fields">
		<?php
			$dist = "GitHub,Email,Phone,Intagram,Twitter,YouTube,Pinchester,Tumbler,SoundCloud,LinkedIn,Skype,Blog,Facebook";
			$ary = explode(',', $dist);
			foreach($ary as $dist){
			   echo "<option value='$dist'>$dist</option>";
			}
		?>
	</select><br>	
	<input id="new_contact_input" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><button onclick='insertContactInfo();' class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
</div>

<script type="text/javascript">
	function insertContactInfo() {
		var par = document.getElementById("contact_info_item_container");
		var val = document.getElementById("new_contact_input").value;
		var opt = document.getElementById("conatct_info_opt").value;
		var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\"><div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div><div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'></div><div class=\"edit_profile_contactinfo_item_value\">"+val+"</div></div>";
		par.innerHTML += code;
	}
</script>