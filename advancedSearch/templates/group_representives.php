<div class="dbox advacnedsearch_section_basic">
	<div class="dboxheader dbox_head_advancedsearch_basic">
		<div class="dboxtitle botmarg">
			Search Society Representatives
		</div>
		Society :&nbsp;&nbsp;
			<select class="advancedsearch_socity_representive_dropdown">
				<?php
					$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
					$ary = explode(',', $dist);
					foreach($ary as $dist){
					   echo "<option value='$dist'>$dist</option>";
					}
				?>
			</select><br>
			
			<hr class="advancedsearch_hr">
		Role :&nbsp;&nbsp;
			<select class="advancedsearch_socity_representive_dropdown">
				<?php
					$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
					$ary = explode(',', $dist);
					foreach($ary as $dist){
					   echo "<option value='$dist'>$dist</option>";
					}
				?>
			</select><br>
		<br>
			<button class="default_button availability_status_button">Search</button>
	</div>
</div>