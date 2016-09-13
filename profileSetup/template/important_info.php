<div>
	<div class="dboxheader ">
		<div class="dboxtitle botmarg">
			Enter Your Birthday
		</div>
		<div style="text-align: center;">
			<input id="new_contact_input" name="firstname" class="edit_profile_important_info_date" placeholder="YY" > &nbsp; / &nbsp;
			<input id="new_contact_input" name="firstname" class="edit_profile_important_info_date" placeholder="MM" > &nbsp; / &nbsp;
			<input id="new_contact_input" name="firstname" class="edit_profile_important_info_date" placeholder="DD" >
		</div>
		<div class="dboxtitle botmarg">
			Current City
		</div>
		<div style="text-align: center;">
			<select class="edit_profile_important_info_dropdown">
				<?php
				$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
				$ary = explode(',', $dist);
				foreach($ary as $dist){
					echo "<option value='$dist'>$dist</option>";
				}
				?>
			</select>
		</div><br>
		<div class="dboxtitle botmarg">
			Home City
		</div>
		<div style="text-align: center;">
			<select class="edit_profile_important_info_dropdown">
				<?php
				$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
				$ary = explode(',', $dist);
				foreach($ary as $dist){
					echo "<option value='$dist'>$dist</option>";
				}
				?>
			</select>
		</div>
	</div>

</div>
