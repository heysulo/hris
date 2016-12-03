<div class="dbox availability_status_box">
	<div class="dboxheader dbox_head_availabilitystatus">
		<div class="dboxtitle">
			Availability Status
		</div>
		<div style="width:100%;height:50px;">
			<div class="availability_dropdown">
				<button class="availability_button">
					<div class="cur_availability_icon" id="availability_icon" ></div>
				</button>
				<div>
					<input class="customstatus" id="txtbox_availability_text">
					<button class="default_button availability_status_button" onclick='setAvailability()'>Set</button>
					<!-- <button class="default_button availability_status_button">Save</button> -->
				</div>

				<div class="availability_dropdown_content">
					<div class="availability_dropdown_item" onclick='setAvailabilityTemp(1);' >
						<div style="width:20%;float:left;height:auto;">
							<div class="saved_availability_icon" style="background-color:#34a853;"></div>
						</div>
						<div class="availability_dropdown_item_text_template">
							Available
						</div>
					</div>

					<div class="availability_dropdown_item" onclick='setAvailabilityTemp(2);'>
						<div style="width:20%;float:left;height:auto;">
							<div class="saved_availability_icon" style="background-color:#fbbc05;"></div>
						</div>
						<div class="availability_dropdown_item_text_template">
							Away
						</div>
					</div>

					<div class="availability_dropdown_item" onclick='setAvailabilityTemp(3);'>
						<div style="width:20%;float:left;height:auto;">
							<div class="saved_availability_icon" style="background-color:#ea4335;"></div>
						</div>
						<div class="availability_dropdown_item_text_template">
							Busy
						</div>
					</div>

					<div class="availability_dropdown_item" onclick='setAvailabilityTemp(4);'>
						<div style="width:20%;float:left;height:auto;">
							<div class="saved_availability_icon" style="background-color:#4285f4;"></div>
						</div>
						<div class="availability_dropdown_item_text_template">
							Lecture
						</div>
					</div>

					<div class="availability_dropdown_item" onclick='setAvailabilityTemp(5);'>
						<div style="width:20%;float:left;height:auto;">
							<div class="saved_availability_icon" style="background-color:#707070;"></div>
						</div>
						<div class="availability_dropdown_item_text_template">
							Unavailable
						</div>
					</div>		
				</div>
			</div>
			<center>
				<p style="font-size:12px;">
					Set your availability status so the others who visit your profile can get to know about your availability inside the university.
				</p>
			</center>
			<!-- <div >
				<select name="cars"  size="5" class="saved_status_messages">
					  <option style="color:#34a853;" value="volvo">Available till 2.00 PM</option>
					  <option style="color:#ea4335;" value="saab">Exam Duty</option>
					  <option style="color:#ea4335;" value="opel">Board Meeting</option>
					  <option style="color:#fbbc05;" value="volvo">Out for Lunch</option>
					  <option style="color:#4285f4;" value="saab">Lecture at W002</option>
				  <option value="audi">Audi</option>
				</select>
			</div> -->
		</div>
		
	</div>

<script type="text/javascript">
	/*
		1 - 34a853 - rgb(52, 168, 83) - AVAILABLE
		2 - fbbc05 - rgb(251, 188, 5) - AWAY
		3 - ea4335 - rgb(234, 67, 53) - BUSY
		4 - 4285f4 - rgb(66, 133, 244) - LECTURE
		5 - 707070 - rgb(112, 112, 112) -UNAVAILABLE

		document.getElementById("availability_icon").style.background="#34a853"
	*/
	
	function setAvailabilityTemp(mode) {
		switch(mode){
			case 1:
				setAvailabilityIconColor("34a853");
				break;
			case 2:
				setAvailabilityIconColor("fbbc05");
				break;
			case 3:
				setAvailabilityIconColor("ea4335");
				break;
			case 4:
				setAvailabilityIconColor("4285f4");
				break;
			case 5:
				setAvailabilityIconColor("707070");
				break;
		}
	}


	function setAvailabilityIconColor(hex){
		document.getElementById("availability_icon").style.background="#"+hex;
	}


	function setAvailability () {
		var status = document.getElementById("txtbox_availability_text").value;
		var color = document.getElementById("availability_icon").style.backgroundColor;
		switch(color){
			case "rgb(52, 168, 83)":
				window.alert("Available + " + status);
				break;
			case "rgb(251, 188, 5)":
				window.alert("Away + " + status);
				break;
			case "rgb(234, 67, 53)":
				window.alert("Busy + " + status);
				break;
			case "rgb(66, 133, 244)":
				window.alert("Lecture + " + status);
				break;
			case "rgb(112, 112, 112)":
				window.alert("Unavailable + " + status);
				break;
			default:
				window.alert("Please select an availability status again");
				break;
		}
	}
</script>
