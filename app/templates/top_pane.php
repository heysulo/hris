<?php include_once ("path.php");?>
<div class="panelTop">
        <div class="divadjustment">
            <div class="top_dropdown">
                <div class="topbox_account_settings" id="setting"></div>
                <div class="top_dropdown_content" id="dropdown">
                        <a href="#">Account Settings</a>
                        <a href="#">Logout</a>
                        <a href="#">Go Offline</a>
                        <a href="#">What the Shit Biscuit?</a>
                </div>
            </div>

            <!--<div class="top_dropdown" id="dropdown">
                    <ul class="top_dropdown_list">
                        <li class="top_dropdown_list_item">Account Settings</li>
                        <li class="top_dropdown_list_item">Logout</li>
                        <li class="top_dropdown_list_item">Go Offline</li>
                        <li class="top_dropdown_list_item" style="color:red;">What the Shit Biscuit?</li>
                    </ul>
                </div>-->

            <!--User detail showing bar-->
            <div class="topprofilecontent">
                <div class=""><img class="topprofilepicture" src=" <?php echo "$imagePath/$pro_pic"; ?> " alt=""></div>
                <div class="topbox_profile_name"> <?php echo "$fname $lname"?></div>
                <div class="topbox_profile_role"><?php echo "$type"?></div>
            </div>

        </div>
</div>