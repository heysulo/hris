<html>
<head>
	<?php
	define('hris_access',true);
	require_once('../templates/path.php');
	include('../templates/_header.php');
	$conn = null;
	require_once("../user/config.conf");
	require_once ("../database/database.php");
	session_start();

	if (!isset($_SESSION['email'])){
		header("location:../../index.php");
	}

	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$type  = $_SESSION['type'];
	$email = $_SESSION['email'];
	$pro_pic = $_SESSION['pro_pic'];
	$user_id = $_SESSION['user_id'];
	$availability_status = $_SESSION['availability_status'];
	$availability_text = $_SESSION['availability_text'];



	$view_id = $_GET["id"];

	$query = "SELECT * FROM member RIGHT JOIN system_role on member.system_role = system_role.system_role_id and member.member_id=$view_id";

	$res = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($res);
	$vision_power= $row['system_vision_power'] ;
	?>
	<title>
		<?php
		if ($row["middle_name"]!=""){
			echo $row['first_name'] . " " .$row['middle_name'] ." " . $row['last_name'] ;
		}else{
			echo $row['first_name'] . " " . $row['last_name'] ;
		}

		?> </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Inconsolata" rel="stylesheet">
</head>
<body>
	<?php

	?>
	<div class="clearfix">
		<div>
			<?php include_once('../templates/navigation_panel.php'); ?>
			<?php include_once('../templates/top_pane.php'); ?>
		</div>
		<?php
		$member_status_text = $row['availability_text'];
		$member_at =  $row['availability_status'];
		$color = "#fff";
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
			<div class="profile_section_intro">
				<img class="profile_profile_image" src="../images/pro_pic/<?php echo $row['profile_picture']?>" alt="" style="box-shadow: 0px 0px 15px 5px <?php echo $color;?>;">
				<div class="profile_name"><?php
					if ($row["middle_name"]!=""){
						echo $row['first_name'] . " " .$row['middle_name'] ." " . $row['last_name'] ;
					}else{
						echo $row['first_name'] . " " . $row['last_name'] ;
					}

					?> </title>
					<?php
						if($row['email'] == $_SESSION['email']){
							echo "<button onclick=\"location.href='../editProfile/index.php';\" class=\"edit_profile_button\">Edit Profile</button>";
						}
					?>

					</div>
				<div class="profile_online_status_box">

					<div class="profile_availability_icon" style="background-color: <?php echo $color;?>"></div>
					<div class="profile_availability_text"><?php echo $member_status_text;?></div>
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
</body>
</html>
