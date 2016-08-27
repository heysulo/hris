<div class="dbox advacnedsearch_section_basic">
	<div class="dboxheader dbox_head_advancedsearch_basic">
		<div class="dboxtitle botmarg">
			Search People
		</div>
		<form>
			First name: <input class="advancedsearch_textbox" type="text" name="fname"><br>
			Last name: <input class="advancedsearch_textbox" type="text" name="lname"><br>
			<hr class="advancedsearch_hr">
			Birthday : 
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
			Gender : <input type="radio" name="gender" value="male" checked> Male
	  		<input type="radio" name="gender" value="female"> Female<br>
	  		<hr class="advancedsearch_hr">
	  		From : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
	  		<select>
				<?php
					$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
					$ary = explode(',', $dist);
					foreach($ary as $dist){
					   echo "<option value='$dist'>$dist</option>";
					}
				?>
			</select><br>
			Lives in :&nbsp;&nbsp;
			<select>
				<?php
					$dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
					$ary = explode(',', $dist);
					foreach($ary as $dist){
					   echo "<option value='$dist'>$dist</option>";
					}
				?>
			</select><br>
		</form>	
	</div>
</div>