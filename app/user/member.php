<html>
<head>
	<?php

	function smartdate($timestamp) {
		$diff =  $timestamp;

		if ($diff <= 0) {
			return 'Now';
		}
		else if ($diff < 60) {
			return grammar_date(floor($diff), ' second(s) ago');
		}
		else if ($diff < 60*60) {
			return grammar_date(floor($diff/60), ' minute(s) ago');
		}
		else if ($diff < 60*60*24) {
			return grammar_date(floor($diff/(60*60)), ' hour(s) ago');
		}
		else if ($diff < 60*60*24*30) {
			return grammar_date(floor($diff/(60*60*24)), ' day(s) ago');
		}
		else if ($diff < 60*60*24*30*12) {
			return grammar_date(floor($diff/(60*60*24*30)), ' month(s) ago');
		}
		else {
			return grammar_date(floor($diff/(60*60*24*30*12)), ' year(s) ago');
		}
	}


	function grammar_date($val, $sentence) {
		if ($val > 1) {
			return $val.str_replace('(s)', 's', $sentence);
		} else {
			return $val.str_replace('(s)', '', $sentence);
		}
	}

	define('hris_access',true);
	require_once('../templates/path.php');
	include('../templates/_header.php');
	$conn = null;
	require_once("../user/config.conf");
	require_once ("../database/database.php");
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (!isset($_SESSION['email'])){
		header("location:../../index.php");
	}

	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$type  = $_SESSION['type'];
	$email = $_SESSION['email'];
	$pro_pic = $_SESSION['pro_pic'];
	$user_id = $_SESSION['user_id'];



	$view_id = $_GET["id"];
	$row = null;
	$vision_power = null;
	$query = "SELECT * FROM member JOIN system_role on member.system_role = system_role.system_role_id and member_id=$view_id";

	$res = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($res);
	if ($row['member_id']!=null){
		$vision_power= $row['system_vision_power'] ;
	}else{
		$view_id = null;
	}

	?>
	<title>
		<?php
		if ($row["middle_name"]!=""){
			echo $row['first_name'] . " " .$row['middle_name'] ." " . $row['last_name'] ;
		}else{
			echo $row['first_name'] . " " . $row['last_name'] ;
		}

		?> </title>

</head>
<body>
	<div>
		<?php include_once('../templates/navigation_panel.php'); ?>
		<?php include_once('../templates/top_pane.php'); ?>
	</div>
	<?php
		if ($view_id!=null){
	?>
	<div class="clearfix">

		<?php
		$member_status_temp =explode("_",$row['availability_status']);
		$member_status_text = $row['availability_text'];
		$member_at =  $row['availability_status'];
		//$color = $member_status_temp[1];

		switch($member_at){
			case "Available":
				$color = "#34a853";
				break;
			case "Away":
				$color = "#fbbc05";
				break;
			case "Busy":
				$color = "#ea4335";
				break;
			case "Lecture":
				$color = "#4285f4";
				break;
			default:
				$color = "#707070";
				break;

		}
		?>
		<div class="bottomPanel">
			<div id="profile_section_intro" class="profile_section_intro_new" style="border-bottom: 25px solid <?php echo $color;?>;" onchange="resize_profile_intro();">
				<?php
				$display_name = "";
				if ($row["middle_name"]!=""){
					$display_name= $row['first_name'] . " " .$row['middle_name'] ." " . $row['last_name'] ;
				}else{
					$display_name = $row['first_name'] . " " . $row['last_name'] ;
				}
				?>

				<img class="profile_profile_image_new" src="../images/pro_pic/<?php echo $row['profile_picture']?>">
				<div id="profile_name" class="profile_name" ><?php

					echo $display_name;

					?>
					<?php
					if ($row['email'] == $_SESSION['email']){
					?>
					<button class="msgbox_button group_writer_button" type="button" onclick="checkinvite();">Edit Profile</button>
					<?php }?>
				</div>
				<div class="profile_online_status_box">
					<div id="availability_icon" class="profile_availability_icon" style="background-color: <?php echo $color;?>"></div>
					<div class="profile_availability_text" id="availability_text">
						<?php echo $member_at;
						if($member_status_text!=""){
							echo "  -  ".$member_status_text;
						}
						?>
					</div>
				</div>
				<div class="profile_last_seen_box">
					<div id="last_seen" class="profile_last_seen_text">Last seen : <?php
						$timeSecond  = strtotime(date("Y-m-d H:i:s"));
						$timeFirst= strtotime($row['last_login']);
						$differenceInSeconds = $timeSecond - $timeFirst;
						//echo $differenceInSeconds;/'/
						echo smartdate($differenceInSeconds);
						?></div>
				</div>
				<div class="profile_basic_summery">
					Role : <?php echo $row['category'];?><br>
					Academic Year : <?php echo $row['academic_year'];?><br>
					Gender : <?php echo $row['gender'];?><br>
					Course : <?php echo "404"?><br>
					Hometown : <?php echo $row['gender'];?><br>
					Username : <?php echo $row['username'];?><br>
				</div>
				<div class="profile_gpa_value">
					3.2
				</div>
				<div class="profile_txt_gpa">Current GPA</div>
				<div class="profile_txt_gpa">Rank : #225</div>
			</div>
			<?php /*
			<div class="profile_section_intro">
				<img class="profile_profile_image" src="../images/pro_pic/<?php echo $row['profile_picture']?>" alt="" style="box-shadow: 0px 0px 15px 5px <?php echo $color;?>;">
				<div class="profile_name"><?php
					if ($row["middle_name"]!=""){
						echo $row['first_name'] . " " .$row['middle_name'] ." " . $row['last_name'] ;
					}else{
						echo $row['first_name'] . " " . $row['last_name'] ;
					}

					?> </title>


					</div>
				<div class="profile_online_status_box">

					<div class="profile_availability_icon" style="background-color: <?php echo $color;?>"></div>
					<div class="profile_availability_text"><?php echo $member_at."  -  ".$member_status_text;?></div>
				</div>
				<div class="profile_last_seen_box">
					<div class="profile_last_seen_text"><?php echo "NOT IMPLEMENTED YET";?></div>
				</div>
				<div class="profile_basic_summery">
					Role : <?php echo $row['category'];?><br>
					Academic Year : <?php echo $row['academic_year'];?><br>
					Gender : <?php echo $row['gender'];?><br>
				</div>
			</div>
 		    */?>

			<div class="profile_section_main">
				<div class="profile_section_main_left">
					<div class="dbox profile_section_contactinfo">
						<div class="dboxheader dbox_head_profilecontactinfo">
							<div class="dboxtitle botmarg">
								Contact Information
							</div>

						</div>

						<?php
						$contact_query = "SELECT field,value FROM member_info WHERE category=1 and member_id=$view_id and system_vision_power_needed<=$vision_power";
						$res_contact_query = mysqli_query($conn,$contact_query);
						if (mysqli_num_rows($res_contact_query)){
							while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
								$value =  $row_qt['value'];;
								$readvalue = $row_qt['value'];
								switch($row_qt['field']){
									case "Email":
										$value="<a class=\"no_link_effects\" href=\"mailto:$readvalue\" target=\"_blank\">$readvalue</a>";
										break;
									case "GitHub":
										$value = "<a class=\"no_link_effects\" href=\"https://github.com/$value\" target=\"_blank\">$value</a>";
										break;
								}
								?>
								<div class="contact_info_item">
									<div class="contact_info_item_field"><?php echo $row_qt['field'] ?> :</div><div class="contact_info_item_value"><?php echo $value ?> </div>
								</div>

								<?php
							}
						}else{
							echo "No Contact Info Found";
						}
						?>

					</div>
					<div class="dbox profile_section_socities">
						<div class="dboxheader dbox_head_profile_socities">
							<div class="dboxtitle botmarg">
								Roles in Clubs and Socities
							</div>
						</div>
						<?php
						$contact_query = "select x.role_name,groups.name,groups.description from (select group_role.role_name,group_member.group_id from group_member JOIN group_role on group_member.role_id = group_role.role_id and member_id=$view_id) as x join groups on groups.group_id = x.group_id";
						//echo $contact_query;
						$res_contact_query = mysqli_query($conn,$contact_query);
						if (mysqli_num_rows($res_contact_query)){
							while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
								?>
								<div class="society_item">
									<div class="society_item_club"><?php echo $row_qt['name'] ;?></div><div class="society_item_role"><?php echo $row_qt['role_name'] ;?></div>
									<div class="society_item_extra">
										<?php echo $row_qt['description'];?>
									</div>
								</div>
								<?php
							}
						}else{
							echo "No Group Info Found";
						}
						?>
					</div>
					<div class="dbox profile_section_languages">
						<div class="dboxheader dbox_head_profile_languages">
							<div class="dboxtitle botmarg">
								Compatible Languages
							</div>
						</div>
						<div>
							<?php
							$contact_query = "select language.language from (SELECT * FROM member_info where category = 2 and member_id=$view_id) as x join language on language.language_id = (SELECT CAST(x.value AS UNSIGNED))";
							$res_contact_query = mysqli_query($conn,$contact_query);
							if (mysqli_num_rows($res_contact_query)){
								while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
									?>
									<div class="skill_item language_item">
										<?= $row_qt['language'];?>
									</div>
									<?php
								}
							}else{
								echo "No Compatible Languages Detected";
							}
							?>
						</div>
					</div>
				</div>
				<div class="profile_section_main_right">

					<div class="dbox profile_section_personal">
						<div class="dboxheader dbox_head_profile_personal">
							<div class="dboxtitle botmarg">
								Shared Information
							</div>

						</div>
						<?php
						$contact_query = "SELECT field,value FROM member_info WHERE category=3 and member_id=$view_id and system_vision_power_needed<=$vision_power";
						$res_contact_query = mysqli_query($conn,$contact_query);
						if (mysqli_num_rows($res_contact_query)){
							while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
								$value =  $row_qt['value'];;
								$readvalue = $row_qt['value'];
								switch($row_qt['field']){
									case "Email":
										$value="<a class=\"no_link_effects\" href=\"mailto:$readvalue\" target=\"_blank\">$readvalue</a>";
										break;
									case "GitHub":
										$value = "<a class=\"no_link_effects\" href=\"https://github.com/$value\" target=\"_blank\">$value</a>";
										break;
								}
								?>
								<div class="contact_info_item">
									<div class="contact_info_item_field"><?php echo $row_qt['field'];?> :</div><div class="contact_info_item_value"><?php echo $value;?> </div>
								</div>
								<?php
							}
						}else{
							echo "No Contact Info Found";
						}
						?>
					</div>
					<div class="dbox profile_section_aboutme">
						<div class="dboxheader dbox_head_profile_aboutme">
							<div class="dboxtitle botmarg">
								About Me
							</div>
							<p>
								<?php
								$contact_query = "SELECT about FROM member WHERE member_id=$view_id;";
								$res_contact_query = mysqli_query($conn,$contact_query);
								$row_qt =  mysqli_fetch_assoc($res_contact_query);
								echo $row_qt['about'];
								?>


							</p>
						</div>
					</div>
					<div class="dbox profile_section_interests">
						<div class="dboxheader dbox_head_profile_interetst">
							<div class="dboxtitle botmarg">
								Skills & Intrests
							</div>
						</div>
						<div>
							<?php
							$contact_query = "select skill.skill from (SELECT * FROM member_info where category = 4 and member_id=$view_id) as x join skill on skill.skill_id = (SELECT CAST(x.value AS UNSIGNED))";
							$res_contact_query = mysqli_query($conn,$contact_query);
							if (mysqli_num_rows($res_contact_query)){
								while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
									?>
									<div class="skill_item language_item">
										<?= $row_qt['skill'];?>
									</div>

									<?php
								}
							}else{
								echo "No Compatible Languages Detected";
							}
							?>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<?php }else{ ?>
			<div class="error_page_box">
				<div class="error_page_text">The link you followed may be broken, or the page may have been removed.</div>
			</div>
	<?php } ?>
	<?php
	include_once('../templates/_footer.php');
	?>

	<script>
		var uid = <?php echo $view_id?>;
		function heartbeat() {
			var json;
			var ss = document.getElementById('availability_text');
			var profile_section_intro = document.getElementById('profile_section_intro');
			var last_seen = document.getElementById('last_seen');
			var availability_icon = document.getElementById('availability_icon');
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (xhr.readyState ==4 && xhr.status == 200){
					json= JSON.parse(xhr.responseText);
					if (json.text==""){

						ss.innerHTML = json.status;// + json.text;
					}else{
						ss.innerHTML = json.status + " - " + json.text;

					}
					last_seen.innerHTML = json.lastseen;
					$color = "#323232"
					switch (json.status){
						case "Available":
							$color = "#34a853";
							break;
						case "Away":
							$color = "#fbbc05";
							break;
						case "Busy":
							$color = "#ea4335";
							break;
						case "Lecture":
							$color = "#4285f4";
							break;
						default:
							$color = "#707070";
							break;
					}
					profile_section_intro.style.borderBottomColor = $color;
					availability_icon.style.backgroundColor = $color;
				}
			};
			xhr.open("POST", "./profile_heartbeat.php", true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send("id="+uid);
		}
		var auto_refresh = setInterval(function() { heartbeat() }, 5000);
		//count();
	</script>

	<script>
		//ProfileSummerYAreaResizes
		function resize_profile_intro() {
			var elem_profile_name = document.getElementById("profile_name");
			var elem_profile_intro = document.getElementById("profile_section_intro");
			//alert(elem_profile_name.offsetHeight);
			var xsheight = parseInt(elem_profile_name.offsetHeight) - 50;
			//alert(xsheight);
			if (xsheight > 0){
				elem_profile_intro.style.height=parseInt(elem_profile_intro.style.height.substr(0,elem_profile_intro.style.height.lastIndexOf("p")))+xsheight ;
			}
			//alert(elem_profile_name.getAttribute("width"));
		}

		resize_profile_intro();
	</script>
</body>

</html>

