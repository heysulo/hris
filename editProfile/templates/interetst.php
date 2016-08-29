<div class="dbox profile_section_interests">
	<div class="dboxheader dbox_head_profile_interetst">
		<div class="dboxtitle botmarg">
			Skills & Intrests
		</div>
	</div>
	<hr class="advancedsearch_hr">
	<div class="dboxheader dbox_head_edit_profile_new_field">
		<div class="dboxtitle botmarg">
			Add new Interests/Skill
		</div>
			
	</div>

	<input id="new_skill_input" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><button onclick="insertSkill();" class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
	<br><br>
	<div id="skill_item_container">
		<?php
			$str =  "Your lists will also appear in the Interests section of your bookmarks. Simply click the list's name to see all the recent posts and activity from the Pages and people featured in the list.";    
			$ary = explode(' ', $str);
			foreach($ary as $str){
			   include("skill_item.php");
			}
		?>
	</div>
</div>

<script type="text/javascript">
	function insertSkill() {
		var par = document.getElementById("skill_item_container");
		var val = document.getElementById("new_skill_input").value;
		var code = "<div class=\"skill_item\"><div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\"></div>"+val+"</div>";
		par.innerHTML += code;
	}
</script>