
<html>
<head>
	<?php
	define('hris_access',true);
	$conn = null;
	require_once("./config.conf");
	require_once("../database/database.php");
	require_once('../templates/path.php');
	include('../templates/_header.php');
	include('../templates/refresher.php');
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (!isset($_SESSION['email'])){
		header("location:../../index.php");
	}
	

	?>
	<title>HRIS | Administration</title>
</head>
<body>
<?php include_once('../templates/navigation_panel.php'); ?>
<?php include_once('../templates/top_pane.php'); ?>
	<div class="clearfix">

		<div class="bottomPanel">
			<?php if($_SESSION['system_admin_panel_access']){

				$ref = $_SERVER['HTTP_REFERER'] ;
				$r_ref = explode('/',$ref);
			if ($r_ref[5] != "admin"){ ?>

				<script>msgbox("We trust you have received the usual lecture from the local System\
					Administrator. It usually boils down to these three things:<br>\
<br>\
					#1) Respect the privacy of others.<br>\
					#2) Think before you type.<br>\
					#3) With great power comes great responsibility.","Adminstrative Access",3);</script>
			<?php
			$active = 1;
			}else{
			$active = 3;
			}
			?>

			<div style="float:left;height:80px;width:100%;">
				<div style="float:left;width:auto;height:100%;">
					<div class="txt_paneltitle">System Administration</div>

				</div>

			</div>
			<div class="group_main_menu">
				<ul>
					<li class="group_main_menu_item group_main_menu_item_active" id="main_menu_members" onclick="activate_tab(1);">Member Management</li>
					<li class="group_main_menu_item" id="main_menu_roles" onclick="activate_tab(2);">Role Management</li>
					<li class="group_main_menu_item" id="main_menu_batch" onclick="activate_tab(3);">Batch Management</li>
				</ul>
			</div>

			<div class="group_div_content" id="tab_roles">
				<div class="dbox group_tab_members group_members_dbox">


					<!-------------------------------ADD NEW ROLES--------------------------->
					<?php if($_SESSION['system_add_system_role'] == 1){?>
					<div class="group_administration_content_field">
						<div class="group_administration_content_field_name">Add New System Role</div>
						<div class="group_administration_content_field_value">
							<span style="font-size: 12px">Create a new system role with different permissions and permission levels which allows the system members use only the allowed funtionalities by the system administrator<br></span>
							<br>
							<button class="msgbox_button group_writer_button " onclick='addnewsystemrole();'>Create New Role</button>
							<script>
								function addnewsystemrole() {
									var xhr = new XMLHttpRequest();
									var search_inp = document.getElementById("member_manage_email_search");
									var dimmer = document.getElementById("popup_dimmer");
									var popupscreen = document.getElementById("popupscreen");

									var popupcontentareax = document.getElementById("popup_content_area");
									var animation = document.getElementById("ajaxloadinganimation");
									popupcontentareax.innerHTML = animation.innerHTML;
									popupscreen.style.display="block";
									xhr.onreadystatechange = function () {
										if (xhr.readyState ==4 && xhr.status == 200){
											var popupcontentarea = document.getElementById("popup_content_area");
											popupcontentarea.innerHTML = xhr.responseText;
											popupscreen.style.display="block";

											dimmer.style.backgroundColor="#000000";
											eval(document.getElementById("ajaxedjsx").innerHTML);
										}
									};
									xhr.open("POST", "./administration_events/newsystemrole.php", true);
									xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									xhr.send("email="+search_inp.value);
								}
							</script>
						</div>
					</div>
					<?php } ?>

					<!-------------------------------UPDATE ROLES--------------------------->
					<?php if($_SESSION['system_change_system_role'] == 1){?>
					<div class="group_administration_content_field">
						<div class="group_administration_content_field_name">Update System Role</div>
						<div class="group_administration_content_field_value">
							<select id="opt_selected_system_update_role" name="opt_box" class="group_administration_dropdown">
								<?php
								$query32 = "SELECT * FROM system_role WHERE system_member_change_power_needed <= ".$_SESSION['system_member_change_power'];
								$result = mysqli_query($conn,$query32);


								if (mysqli_num_rows($result)){
									while ($row_qt =  mysqli_fetch_assoc($result)){
										echo "<option value='".$row_qt['system_role_id']."'>".$row_qt['name']."</option>";
									}
								}

								?>
							</select>
							<button class="msgbox_button group_writer_button yellow_button" onclick='updatesystemrole();'>Update System Role</button><br><br>
							<span style="font-size: 12px">Make changes to the system roles that you created. Grand some new privilidges and revoke the privildges that you no longer wish to grant. Changing a system role will apply to all the memeber who are part of the relavant system role inside the system. <br></span>
							<script>
								function updatesystemrole() {
									var xhr = new XMLHttpRequest();
									var opt_box = document.getElementById("opt_selected_system_update_role");
									var dimmer = document.getElementById("popup_dimmer");
									var popupscreen = document.getElementById("popupscreen");

									var popupcontentareax = document.getElementById("popup_content_area");
									var animation = document.getElementById("ajaxloadinganimation");
									popupcontentareax.innerHTML = animation.innerHTML;
									popupscreen.style.display="block";
									xhr.onreadystatechange = function () {
										if (xhr.readyState ==4 && xhr.status == 200){
											var popupcontentarea = document.getElementById("popup_content_area");
											popupcontentarea.innerHTML = xhr.responseText;
											popupscreen.style.display="block";

											dimmer.style.backgroundColor="#ffd700";
											eval(document.getElementById("ajaxedjs2").innerHTML);
										}
									};
									xhr.open("POST", "./administration_events/updatesystemrole.php", true);
									xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									xhr.send("opt_box="+opt_box.value);
								}

							</script>
						</div>
					</div>
					<?php } ?>


					<!-------------------------------DELETE ROLES--------------------------->
					<?php if($_SESSION['system_delete_system_role'] == 1){?>
						<div class="group_administration_content_field">
							<div class="group_administration_content_field_name">Delete System Role</div>
							<div class="group_administration_content_field_value">
								<select id="opt_delete_selected_role" class="group_administration_dropdown">
									<?php
									$query32 = "SELECT * FROM system_role WHERE system_member_delete_power_needed <= ".$_SESSION['system_member_delete_power']." and system_member_change_power_needed <= ".$_SESSION['system_member_change_power'];
									$result = mysqli_query($conn,$query32);


									if (mysqli_num_rows($result)){
										while ($row_qt =  mysqli_fetch_assoc($result)){
											echo "<option value='".$row_qt['system_role_id']."'>".$row_qt['name']."</option>";
										}
									}

									?>
							</select>
								<button class="msgbox_button group_writer_button red_button" onclick='deletesystemrole();'>Delete System Role</button><br><br>
								<span style="font-size: 12px">Securely delete a system role from the system and relocate the members of the deleting system role into another existing system role which may have different permission settings<br></span>
								<script>
									function deletesystemrole() {
										var xhr = new XMLHttpRequest();
										var opt_box = document.getElementById("opt_delete_selected_role");
										var dimmer = document.getElementById("popup_dimmer");
										var popupscreen = document.getElementById("popupscreen");

										var popupcontentareax = document.getElementById("popup_content_area");
										var animation = document.getElementById("ajaxloadinganimation");
										popupcontentareax.innerHTML = animation.innerHTML;
										popupscreen.style.display="block";
										xhr.onreadystatechange = function () {
											if (xhr.readyState ==4 && xhr.status == 200){

												var popupcontentarea = document.getElementById("popup_content_area");
												popupcontentarea.innerHTML = xhr.responseText;
												dimmer.style.backgroundColor = "#ff0000";
												popupscreen.style.display="block";
												eval(document.getElementById("ajaxedjs2").innerHTML);
											}
										};
										xhr.open("POST", "./administration_events/deletesystemrole.php", true);
										xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										xhr.send("opt_box="+opt_box.value);
									}

								</script>
							</div>
						</div>
					<?php } ?>

				</div>




			</div>


			<div class="group_div_content" id="tab_members">
				<div class="dbox group_tab_members group_members_dbox">

					<?php if($_SESSION['system_member_add_power']){?>
					<!-------------------------------ADD NEW MEMBERS--------------------------->
						<div class="group_administration_content_field">
							<div class="group_administration_content_field_name">Add New Member</div>
							<div class="group_administration_content_field_value">
								<form>
									<input type="text" class="group_administration_txtbox" placeholder="New Member's Email Address" id="new_member_email"><br>
									<select id="new_member_role" class="group_administration_dropdown">
										<?php
										$my_role_power = $_SESSION['system_member_add_power'];
										$query2 = "SELECT * FROM system_role WHERE system_member_add_power_needed <= $my_role_power";
										$result = mysqli_query($conn,$query2);


										if (mysqli_num_rows($result)){
											while ($row_qt =  mysqli_fetch_assoc($result)){
												echo "<option value='".$row_qt['system_role_id']."'>".$row_qt['name']."</option>";
											}
										}

										?>
									</select>

									<button class="msgbox_button group_writer_button" type="button" onclick='checkinvite();'>Send Invitation</button>
								</form>
							</div>
						</div>

						<!-------------------------------BULK ADD NEW MEMBERS--------------------------->
						<div class="group_administration_content_field">
							<div class="group_administration_content_field_name">Bulk Invitation</div>
							<div class="group_administration_content_field_value">
								<span style="font-size: 12px">Invite more than one member at a time by uploading a XLS file containing <br> member's email address</span><br>
								<button class="msgbox_button group_writer_button " onclick='closemsgbox();window.alert(";)");'>Bulk Invitation</button>
							</div>
						</div>
					<?php }?>

					<!-------------------------------MEMBER MANAGEMENT--------------------------->
					<?php if($_SESSION['system_member_change_power']){?>

					<div class="group_administration_content_field">
						<div class="group_administration_content_field_name">Manage Member</div>
						<div class="group_administration_content_field_value">
							<input id="member_manage_email_search" type="email" class="group_administration_txtbox" value="remalsha@gmail.com" placeholder="Member's Email Address">
							<button class="msgbox_button group_writer_button " onclick='searchandretrivemembers();'>Search Member by Email</button>
							<br>

							<script>
								function searchandretrivemembers() {
									var xhr = new XMLHttpRequest();
									var search_inp = document.getElementById("member_manage_email_search");
									var popupscreen = document.getElementById("popupscreen");
									var dimmer = document.getElementById("popup_dimmer");
									var popupcontentareax = document.getElementById("popup_content_area");
									var animation = document.getElementById("ajaxloadinganimation");
									popupcontentareax.innerHTML = animation.innerHTML;
									popupscreen.style.display="block";
									xhr.onreadystatechange = function () {
										if (xhr.readyState ==4 && xhr.status == 200){
											if (xhr.responseText=="error"){
												//err
											}else if (xhr.responseText == "0"){
												msgbox("The email address you entered does not belong to any accounts in the system. Please check the email and try again.","No Results",2);

											}else{
												var popupcontentarea = document.getElementById("popup_content_area");
												popupcontentarea.innerHTML = xhr.responseText;
												popupscreen.style.display="block";
												dimmer.style.backgroundColor="#000000";
												eval(document.getElementById("ajaxedjs").innerHTML)
											}
										}
									};
									xhr.open("POST", "./administration_events/searchmember.php", true);
									xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									xhr.send("email="+search_inp.value);

								}
							</script>

							<div style="float:left;font-size: 12px">Search the member by the email address and make changes to the profile</div>
							<br class="containerdivNewLine">
							<br>
							<span id="section_member_manage" style="display: none">
							
							</span>
							<div style="clear: both;"></div>


						</div>
					</div>
					<?php }?>
					<?php
						if(!($_SESSION['system_member_change_power'] || $_SESSION['system_member_add_power'])){
							echo "You dont have any member management permissions";
						}
					?>
				</div>
			</div>

				<!-- ---------------------------------------- Batch details adding ---------------------------------->

				<div class="group_div_content" id="tab_batch">
					<div class="dbox group_tab_members group_members_dbox">

						<?php if($_SESSION['system_member_add_power']){?>

                            <div class="group_administration_content_field">
                                <div class="group_administration_content_field_name">Batch Detail </div>
                                <dvi class="group_administration_content_field_value">

                                    <button class="msgbox_button group_writer_button" name="batchFunction" onclick="window.location.replace('/hris/app/admin/batchFunction.php')">Batch Functions</button>
                                </dvi>
                            </div>
							<div class="group_administration_content_field">
								<div class="group_administration_content_field_name">Academic Detail</div>
								<dvi class="group_administration_content_field_value">

									<button class="msgbox_button group_writer_button" name="academicFunction" onclick="window.location.replace('/hris/app/admin/academicFunction.php')">Academic Functions</button>
								</dvi>
							</div>
						<?php }?>


						<?php
						if(!($_SESSION['system_member_change_power'] || $_SESSION['system_member_add_power'])){
							echo "You dont have any member management permissions";
						}
						?>
					</div>
				</div>


			<?php }else{?>
				<div class="error_page_box">
					<div class="error_page_text">The link you followed may be broken, or the page may have been removed.</div>
				</div>


			<?php }?>




		</div>

		

		<script>
			function activate_tab(x) {
				var tab_roles = document.getElementById("tab_roles");
				var tab_members = document.getElementById("tab_members");
				var tab_batch = document.getElementById("tab_batch");

				var main_menu_members = document.getElementById("main_menu_members");
				var main_menu_roles = document.getElementById("main_menu_roles");
				var main_menu_batch = document.getElementById("main_menu_batch");

				switch (x){
					case 2:
						tab_roles.style.display = "block";
						tab_members.style.display = "none";
						tab_batch.style.display = "none";
						main_menu_members.className = "group_main_menu_item";
						main_menu_roles.className = "group_main_menu_item group_main_menu_item_active";
						main_menu_batch.className = "group_main_menu_item";
						break;
					case 1:
						tab_roles.style.display = "none";
						tab_members.style.display = "block";
						tab_batch.style.display = "none";
						main_menu_members.className = "group_main_menu_item group_main_menu_item_active";
						main_menu_roles.className = "group_main_menu_item";
						main_menu_batch.className = "group_main_menu_item";
						break;
					case 3:
						tab_roles.style.display = "none";
						tab_members.style.display = "none";
						tab_batch.style.display = "block";
						main_menu_batch.className = "group_main_menu_item group_main_menu_item_active";
						main_menu_members.className = "group_main_menu_item";
						main_menu_roles.className = "group_main_menu_item";
						break;

				}
			}

			activate_tab( <?php echo $active?>);
		</script>
	</div>
	<?php
	include_once('../templates/_footer.php');
	?>


	<script>
		function checkinvite() {
			var email = document.getElementById("new_member_email").value;
			if (validateEmail(email)==false){
				msgbox("The email address you entered does not appears to valid. Please insert a valid email address inorder to continue","Invalid Email Address");
				return;
			}
			var xhttp = new XMLHttpRequest();
			var dimmer = document.getElementById("popup_dimmer");
			var popupscreen = document.getElementById("popupscreen");
			var popupcontentareax = document.getElementById("popup_content_area");
			var animation = document.getElementById("ajaxloadinganimation");
			popupcontentareax.innerHTML = animation.innerHTML;

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var res = this.responseText;
					if (res=="01"){
						msgbox("The email address you entered is already associated with an account inside the system","Email Address in Use",2);
					}else if(res=="10") {
						msgbox("An active invitation is already pending to the email address you provided", "Email Address already have an active invitation", 2);
					}else if(res="00"){
						var role_id = document.getElementById("new_member_role").value;
						var xhr = new XMLHttpRequest();

						xhr.onreadystatechange = function () {
							if (xhr.readyState ==4 && xhr.status == 200){
								switch (xhr.responseText.split("_")[0]){
									case "success":
										msgbox("An invitation has being successfully sent to " + email + " with instructions to join the system. Email delivery will take upto 20 minutes depending on the network<br><br><a href=' <?php echo $appPath?>user/profileSetup/setupProfile.php?token="+xhr.responseText.split("_")[1]+"'>Invite Link<a/>","Invitation Sent",1);
										document.getElementById("new_member_email").value = "";
										break;
									case "0x4":
										msgbox("You don't have permission to perform this task. Either your permission has being revoked from the system or an act of intentional unauthorized access.","Permission Denied",3);
										break;
									case "0x3":
										msgbox("The selected role somehow does not exist in the system. Try reloading the page and sending an invite again","Role Does Not Exist",3)
										break;
									case "0x1":
										msgbox("The email address you entered is already associated with an account inside the system","Email Address in Use",2);
										break;
									case "0x2":
										msgbox("An active invitation is already pending to the email address you provided", "Email Address already have an active invitation", 2);
										break;
									case "0x5":
										msgbox("Unable to send an invitation to " + email + ". Please reload the page and try again in few minutes", "Invitation Not Sent",3);
										break;
									default:
										msgbox("A serious error occured while the action was in process","Error Ocuured",3);
										break;
								}
								popupscreen.style.display="none";
							}
						};
						xhr.open("POST", "./administration_events/invite_member.php", true);
						xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhr.send("email="+email+"&role="+role_id);
					}else {
						msgbox("A serious error occured while the action was in process","Error Ocuured",3);
					}
				}
			};
			xhttp.open("POST", "./administration_events/invitation_email_verification.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("email="+email);
		}

		function validateEmail(input) {
			var atpos = input.indexOf("@");
			var dotpos = input.lastIndexOf(".");
			if (atpos>0 && dotpos> atpos+1 && dotpos < input.length) {
				return true;
			}else{
				return false;
			}

		}

	</script>

</body>

</html>