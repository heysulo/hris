<div style="float:left;font-size: 12px">Search the member by the email address and make changes to the profile</div>
<br class="containerdivNewLine">
<br>
<div class="sys_admin_selected_profile_box">
    <div class="group_member_hd_propic"></div>
    <div class="group_member_hd_name">Sulochana Kodituwakku</div>
    <div class="group_member_hd_role">President</div>
    <div class="group_member_hd_role">Computer Science</div>
</div>
<div style="clear: both;"></div>

<br>
<div class="ui group_administration_checkbox">
    <label>Role inside system : </label>
    <select id="conatct_info_opt" class="group_administration_dropdown">
        <?php
        $dist = "Student,Lecturer,Instructor";
        $ary = explode(',', $dist);
        foreach($ary as $dist){
            echo "<option value='$dist'>$dist</option>";
        }
        ?>
    </select>
</div>
<br><br>
<div class="ui group_administration_checkbox">
    <input type="checkbox" class="ui group_administration_checkbox" >
    <label>Force Password Reset</label>
</div>
<div class="ui group_administration_checkbox">
    <input type="checkbox" class="ui group_administration_checkbox" >
    <label>Suspend Account</label>
</div>
<div class="ui group_administration_checkbox">
    <input type="checkbox" class="ui group_administration_checkbox" >
    <label>Password reset block</label>
</div>
<br>
<button class="msgbox_button group_writer_button yellow_button" onclick='closemsgbox();window.alert(";)");'>Confirm Changes</button>