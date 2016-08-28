<div class="dbox advacnedsearch_section_basic">
	<div class="dboxheader dbox_head_advancedsearch_basic">
		<div class="dboxtitle botmarg">
			Search People
		</div>
		<form>
			<div class="clearfloat">
				<input type="checkbox">First name: <input class="advancedsearch_textbox floatright" type="text" name="fname"><br>
			</div>
			<div class="clearfloat">
				<input type="checkbox">Last name: <input class="advancedsearch_textbox floatright" type="text" name="lname"><br>
			
			</div>
			<hr class="advancedsearch_hr">
			<input type="checkbox">Birthday : 
			<select>
				<?php
					for($i = 1900; $i < 2016; ++$i) {
						echo "<option value='$i'>$i</option>";
					}
				?>
			</select>
			<select>
				<?php
					for($i = 1; $i < 13; ++$i) {
						echo "<option value='$i'>$i</option>";
					}
				?>
			</select><br>
			<input type="checkbox">Gender : <input type="radio" name="gender" value="male" checked> Male
	  		<input type="radio" name="gender" value="female"> Female<br>
	  		<hr class="advancedsearch_hr">
	  		<input type="checkbox">From : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
	  		<select>
				<?php
					$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
					$ary = explode(',', $dist);
					foreach($ary as $dist){
					   echo "<option value='$dist'>$dist</option>";
					}
				?>
			</select><br>
			<input type="checkbox">Lives in :&nbsp;&nbsp;
			<select>
				<?php
					$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
					$ary = explode(',', $dist);
					foreach($ary as $dist){
					   echo "<option value='$dist'>$dist</option>";
					}
				?>
			</select><br>
			<hr class="advancedsearch_hr">
			<div class="clearfloat">
				<input type="checkbox">Skills/Interests: <br>
				<div class="advancedsearch_interestpick_area">
				</div>
			</div>
			<hr class="advancedsearch_hr">
			<div class="clearfloat">
				<input type="checkbox">Clubs and Societies: <br>
				<div class="advancedsearch_interestpick_area">
				</div>
			</div>
			<hr class="advancedsearch_hr">

			<div class="clearfloat">
				<input type="checkbox">Filter: <input class="advancedsearch_textbox floatright" type="text" name="fname"><br>
			</div>
			<br>

			<button class="default_button availability_status_button">Search</button>
		</form>	
	</div>
</div>