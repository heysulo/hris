<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
$email = htmlspecialchars($_REQUEST['email']);
$_SESSION['selected_member_email'] = $email;
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
        <form id="changememberform" method="post" action="administration_events/changemember.php">
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
                <select name="conatct_info_opt" class="group_administration_dropdown">
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
                <input name="chk_force_password_reset" type="checkbox" class="ui group_administration_checkbox" checked="true">
                <?php }else{ ?>
                    <input name="chk_force_password_reset" type="checkbox" class="ui group_administration_checkbox" >
                <?php }?>
                <label>Force Password Reset</label>
            </div>

            <?php if($my['system_member_suspend_power'] >= $his['system_member_suspend_power_needed']){ ?>

            <div class="ui group_administration_checkbox">
                <input name="chk_suspend_account" type="checkbox" class="ui group_administration_checkbox" >
                <label>Suspend Account</label>
            </div>
            <?php }?>
            
            
            <div class="ui group_administration_checkbox">

                <?php if ((strtotime(date('Y-m-d H:i:s'))-strtotime($his['password_reset_block']))/3600 > 24){ ?>
                    <input name="chk_password_reset_block" type="checkbox" class="ui group_administration_checkbox" >
                <?php }else{ ?>
                    <input name="chk_password_reset_block" type="checkbox" class="ui group_administration_checkbox" checked="true">
                <?php } ?>
                <label>Password reset block</label>
            </div>
            <br>

        </form>
        </div>
        <div class="msgbbox_section_bottom" align="right">
            <button id="confirm_btn" class="msgbox_button group_writer_button yellow_button" type="button">Confirm Changes</button>
            <button class="msgbox_button msgbox_button_default" onclick='document.getElementById("popupscreen").style.display = "none"'>Close</button>
            <script id="ajaxedjs">
                $("#confirm_btn").click(function(e) {

                    var url = "administration_events/changemember.php"; // the script where you handle the form input.

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#changememberform").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            document.getElementById("popupscreen").style.display = "none";
                            if (data=="success"){
                                msgbox("New settings for the profile <?php echo $email;?> has being applied and will be taken into effect immediately","Settings Saved",1);
                            }else if(data=="0x01"){
                                msgbox("Something went wrong. It appears to be that you don't have access to the administration panel","Permission Denied",3);

                            }else{
                                msgbox("Something went wrong and we are working on a solution for this error.","Unknown Error",3);

                            }
                        }
                    });

                    //e.preventDefault(); // avoid to execute the actual submit of the form.
                });
            </script>
        </div>


        



        <?php
    }else{
        echo "0";
    }
}else{
    echo "error";
}