<div class="dbox dbox_management">
	<div class="dboxheader dbox_head_member_management">
		<div class="dboxtitle">
			Member Management
		</div>
		<div style="width:100%;height:auto;">
			<ul class="admin_member_management_navbar">
				<li id="admin_memeber_manage_navbar_list_item_1" class="admin_member_management_navbar_item admin_member_management_navbar_item_active" onclick="activate_tab(1);">Add</li>
				<li id="admin_memeber_manage_navbar_list_item_2" class="admin_member_management_navbar_item" onclick="activate_tab(2);">Suspend</li>
				<li id="admin_memeber_manage_navbar_list_item_3" class="admin_member_management_navbar_item" onclick="activate_tab(3);">Delete</li>
				<li id="admin_memeber_manage_navbar_list_item_4" class="admin_member_management_navbar_item" onclick="activate_tab(4);">Manage</li>
			</ul>
		</div>
		<div class="admin_member_management_content">
			<?php
			include("member_add.php");
			include("member_suspend.php");
			include("member_delete.php");
			include("member_manage.php");
			?>
		</div>
	</div>
</div>

<script>
	function activate_tab(x) {
		var tab_add = document.getElementById("member_management_panel_add");
		var tab_suspend = document.getElementById("member_management_panel_suspend");
		var tab_delete = document.getElementById("member_management_panel_delete");
		var tab_manage = document.getElementById("member_management_panel_manage");
		var navbar_add = document.getElementById("admin_memeber_manage_navbar_list_item_1");
		var navbar_suspend = document.getElementById("admin_memeber_manage_navbar_list_item_2");
		var navbar_delete = document.getElementById("admin_memeber_manage_navbar_list_item_3");
		var navbar_manage = document.getElementById("admin_memeber_manage_navbar_list_item_4");

		switch (x){
			case 1:
				tab_add.style.display = "block";
				tab_suspend.style.display = "none";
				tab_delete.style.display = "none";
				tab_manage.style.display = "none";

				navbar_add.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
				navbar_suspend.className = "admin_member_management_navbar_item";
				navbar_delete.className = "admin_member_management_navbar_item";
				navbar_manage.className = "admin_member_management_navbar_item";
				break;
			case 2:
				tab_add.style.display = "none";
				tab_suspend.style.display = "block";
				tab_delete.style.display = "none";
				tab_manage.style.display = "none";

				navbar_add.className = "admin_member_management_navbar_item";
				navbar_suspend.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
				navbar_delete.className = "admin_member_management_navbar_item";
				navbar_manage.className = "admin_member_management_navbar_item";
				break;
			case 3:
				tab_add.style.display = "none";
				tab_suspend.style.display = "none";
				tab_delete.style.display = "block";
				tab_manage.style.display = "none";

				navbar_add.className = "admin_member_management_navbar_item";
				navbar_suspend.className = "admin_member_management_navbar_item";
				navbar_delete.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
				navbar_manage.className = "admin_member_management_navbar_item";
				break;
			case 4:
				tab_add.style.display = "none";
				tab_suspend.style.display = "none";
				tab_delete.style.display = "none";
				tab_manage.style.display = "block";

				navbar_add.className = "admin_member_management_navbar_item";
				navbar_suspend.className = "admin_member_management_navbar_item";
				navbar_delete.className = "admin_member_management_navbar_item";
				navbar_manage.className = "admin_member_management_navbar_item admin_member_management_navbar_item_active";
				break;
		}
	}

	activate_tab(1);
</script>