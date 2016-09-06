<div>
	<div class="dboxheader dbox_head_profile_languages">
		<div class="dboxtitle botmarg">
			Compatible Languages
		</div>
	</div>
	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new Languages
		</div>
			
	</div>
	
	<input  id="new_language_input" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><button onclick="insertLanguage()" class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
	<br><br>
	<div id="language_item_container">
		<?php
			$str =  "Af-Soomaali,Afrikaans,Azərbaycan dili,Bahasa Indonesia,Bahasa Melayu,Basa Jawa,Bisaya,Bosanski,Brezhoneg";    
			$ary = explode(',', $str);
			foreach($ary as $str){
			   include("language_item.php");
			}
		?>
	</div>
	<br>
	
</div>

<script type="text/javascript">
	function insertLanguage() {
		var par = document.getElementById("language_item_container");
		var val = document.getElementById("new_language_input").value;
		var code = "<div class=\"skill_item language_item\"><div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\"></div>"+val+"</div>";
		par.innerHTML += code;
	}
</script>