<div class="dbox profile_section_languages">
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
	
	<input id="fname" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
	<center><button class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
	<br><br>
	<div>
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