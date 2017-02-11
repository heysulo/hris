<div class="dbox profile_section_languages">
	<div class="dboxheader dbox_head_profile_languages">
		<div class="dboxtitle botmarg">
			Compatible Languages
		</div>
	</div>
	<div>
		<?php
			$str =  "Af-Soomaali,Afrikaans,Azərbaycan dili,Bahasa Indonesia,Bahasa Melayu,Basa Jawa,Bisaya,Bosanski,Brezhoneg";    
			$ary = explode(',', $str);
			foreach($ary as $str){
			   include("language_item.php");
			}
		?>
	</div>
</div>