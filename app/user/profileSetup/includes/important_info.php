<div>
	<div class="dboxheader ">
		<div class="dboxtitle botmarg">
			Enter Your Birthday
		</div>
		<div style="text-align: center;">
			<!--<input type="number" id="birth_year" name="year" class="edit_profile_important_info_date" placeholder="YYYY" min="1900" max="2100" maxlength="4" required> &nbsp; / &nbsp;
			<input type="number" id="birth_month" name="month" class="edit_profile_important_info_date" placeholder="MM" min="01" max="12" maxlength="2" required> &nbsp; / &nbsp;
			<input type="number" id="birth_date" name="day" class="edit_profile_important_info_date" placeholder="DD" min="01" max="31" maxlength="2" required>-->
			<div id="birthDayFields"></div> <!--Jquery birth day picker plugin use -->
			<input type="hidden" id="user_birth_day" name="user_birth_day" required>

		</div>
		<div class="dboxtitle botmarg">
			Current City
		</div>
		<div style="text-align: center;">
			<select class="edit_profile_important_info_dropdown" name="current_city" id="currentCity" required>
				<option value=''>-- Select --</option>
				<?php
				$query2 = "SELECT * FROM district";
				$result = mysqli_query($conn,$query2);
				if (mysqli_num_rows($result)){
					while ($row_qt =  mysqli_fetch_assoc($result)){
						echo "<option value='".$row_qt['district_id']."'>".$row_qt['name']."</option>";
					}
				}






//				$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
//				$ary = explode(',', $dist);
//				foreach($ary as $dist){
//					echo "<option value='$dist'>$dist</option>";
//				}
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
				$query2 = "SELECT * FROM district";
				$result = mysqli_query($conn,$query2);
				if (mysqli_num_rows($result)){
					while ($row_qt =  mysqli_fetch_assoc($result)){
						echo "<option value='".$row_qt['district_id']."'>".$row_qt['name']."</option>";
					}
				}
				?>
			</select>
		</div>
	</div>

</div>
