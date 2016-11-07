<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once ("../../database/database.php");
$email = htmlspecialchars($_REQUEST['email']);
if (isset($_SESSION["system_admin_panel_access"])){
    $query1 = "SELECT email, first_name, middle_name, last_name, category, course, profile_picture, force_password_reset, password_reset_block, reset_code_enabled, system_role,system_admin_panel_access,system_member_suspend_power, system_member_suspend_power_needed, system_member_delete_power_needed, system_member_change_power_needed,name,system_member_change_power,system_member_add_power FROM member JOIN system_role on member.system_role = system_role.system_role_id and email=\"$email\"";
    $res1 = mysqli_query($conn,$query1);
    $myemail = $_SESSION['email'];
    $query2 = "SELECT email, first_name, middle_name, last_name, category, course, profile_picture, force_password_reset, password_reset_block, reset_code_enabled, system_role,system_admin_panel_access,system_member_suspend_power, system_member_suspend_power_needed, system_member_delete_power_needed, system_member_change_power_needed,name,system_member_change_power,system_member_add_power FROM member JOIN system_role on member.system_role = system_role.system_role_id and email=\"$myemail\"";
    $res2 = mysqli_query($conn,$query2);
    $my = mysqli_fetch_assoc($res2);
    if (mysqli_num_rows($res1)==1 and $my['system_admin_panel_access']=="1"){
        $his = mysqli_fetch_assoc($res1);
        ?>
<!--        HTML CONTENT-->
        <div class="msgbox_section_title">
            <div class="msgbox_title">Member Management / <?php echo $his['email']; ?></div>
            <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
        </div>
        <div style="margin: 30px">
            <div class="sys_admin_selected_profile_box" >
                <img id="smm_img" class="group_member_hd_propic" src="../images/pro_pic/<?php echo $his['profile_picture'];?>">
                <div id="smm_name" class="group_member_hd_name"><?php echo $his['first_name']." ".$his['last_name'];?></div>
                <div id="smm_role" class="group_member_hd_role"><?php echo $his['name'];?></div>
                <div id="smm_course" class="group_member_hd_role"><?php echo $his['email'];?></div>
            </div>
            <div style="clear: both;"></div>

            <br>
            <?php if($my['system_member_change_power'] >= $his['system_member_change_power_needed']){ ?>
            <div class="ui group_administration_checkbox">
                <label>Role inside system : </label>
                <select id="conatct_info_opt" class="group_administration_dropdown">
                    <?php
                    $my_role_power = $my['system_member_add_power'];
                    $query32 = "SELECT * FROM system_role WHERE system_member_add_power_needed <= $my_role_power";
                    $result = mysqli_query($conn,$query32);


                    if (mysqli_num_rows($result)){
                        while ($row_qt =  mysqli_fetch_assoc($result)){
                            if ($row_qt['name']==$his['name']){
                                echo "<option selected=\"selected\" value='".$row_qt['system_role_id']."'>".$row_qt['name']."</option>";
                            }else{
                                echo "<option value='".$row_qt['system_role_id']."'>".$row_qt['name']."</option>";

                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <br><br>
            <?php }?>


            <div class="ui group_administration_checkbox">
                <?php if($his['force_password_reset'] == "1"){?>
                <input id="chk_force_password_reset" type="checkbox" class="ui group_administration_checkbox" checked="true">
                <?php }else{ ?>
                    <input id="chk_force_password_reset" type="checkbox" class="ui group_administration_checkbox" >
                <?php }?>
                <label>Force Password Reset</label>
            </div>

            <?php if($my['system_member_suspend_power'] >= $his['system_member_suspend_power_needed']){ ?>

            <div class="ui group_administration_checkbox">
                <input id="chk_suspend_account" type="checkbox" class="ui group_administration_checkbox" >
                <label>Suspend Account</label>
            </div>
            <?php }?>
            
            
            <div class="ui group_administration_checkbox">

                <?php if ((strtotime(date('Y-m-d H:i:s'))-strtotime($his['password_reset_block']))/3600 > 24){ ?>
                    <input id="chk_password_reset_block" type="checkbox" class="ui group_administration_checkbox" >
                <?php }else{ ?>
                    <input id="chk_password_reset_block" type="checkbox" class="ui group_administration_checkbox" checked="true">
                <?php } ?>
                <label>Password reset block</label>
            </div>
            <br>


        </div>
        <div class="msgbbox_section_bottom" align="right">
            <button class="msgbox_button group_writer_button yellow_button" style="color: #000" >Confirm Changes</button>
            <button class="msgbox_button msgbox_button_default" onclick='closemsgbox()'>Close</button>
        </div>


        <?php
    }else{
        echo "0";
    }
}else{
    echo "error";
}