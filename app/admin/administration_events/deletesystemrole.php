<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = null;
require_once("../config.conf");
require_once("../../database/database.php");
require_once("../../templates/refresher.php");
$role_id = htmlspecialchars($_REQUEST['opt_box']);
$_SESSION['seletced_role_id'] = $role_id;
if (isset($_SESSION["system_admin_panel_access"])){
    $query1 = "SELECT * FROM system_role WHERE system_role_id = ".$role_id;
    $res1 = mysqli_query($conn,$query1);
    if (mysqli_num_rows($res1)==1 and $_SESSION['system_admin_panel_access']=="1"){
        $row = mysqli_fetch_assoc($res1);
        ?>
        <!--        HTML CONTENT-->
        <form id="deletesystemroleform" method="post" action="administration_events/">
            <div class="msgbox_section_title">
                <div class="msgbox_title">Delete System Role / <?php echo $row['name']; ?></div>
                <div class="popup_close_button" onclick='document.getElementById("popupscreen").style.display = "none"'></div>
            </div>
            <div style="margin: 20px;max-height: 450px;overflow: auto;max-width: 500px;">
                <span>Relocate the members to </span>
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
                </select><br><br>
                <span style="font-size: 12px;color:#ff0000;">Make changes to the system roles that you created. Grand some new privilidges and revoke the privildges that you no longer wish to grant. Changing a system role will apply to all the memeber who are part of the relavant system role inside the system. <br></span>



            </div>
        </form>
        <div class="msgbbox_section_bottom" align="right">
            <button id="confirm_btn" class="msgbox_button group_writer_button red_button" type="button">Delete System Role</button>
            <button class="msgbox_button msgbox_button_default" onclick='document.getElementById("popupscreen").style.display = "none"'>Close</button>
            <script id="ajaxedjs2">
                //alert("proce");
                $("#confirm_btn").click(function(e) {

                    var url = "administration_events/.php"; // the script where you handle the form input.

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#updatesystemrole").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            document.getElementById("popupscreen").style.display = "none";
                            //alert(data);
                            if (data=="success"){
                                msgbox("New permission settings for the system role <b><?php echo $row['name']; ?></b> has being saved successfully and will be taken into effect immediately.","System Role Updated",1);
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