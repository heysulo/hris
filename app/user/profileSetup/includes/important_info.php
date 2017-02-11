<div>
	<div class="dboxheader ">
		<div class="dboxtitle botmarg">
			Enter Your Birthday
		</div>
		<div style="text-align: center;">
			<div id="birthDayFields"></div> <!--Jquery birth day picker plugin use -->
			<input type="hidden" id="user_birth_day" name="user_birth_day" required />

		</div>
		<div class="dboxtitle botmarg">
			Current City
		</div>
		<div style="text-align: center;">
			<select class="edit_profile_important_info_dropdown" name="current_city" id="currentCity" required>
				<option value=''>-- Select --</option>
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
			<select class="edit_profile_important_info_dropdown" name="hometown" id="hometown" required>
				<option value=''>-- Select --</option>
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
