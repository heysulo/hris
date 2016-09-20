<?php
session_start();

if(!isset($_SESSION['email'])){
    header("location:../../index.php");
}else {

    $conn = null;
    require_once("../config.conf");
    require_once("../../database/database.php");

    function createRole($conn)
    {
        //Get user inputs
        $createRole = $_POST['createRole'];
        $role_name = mysqli_real_escape_string($conn,$_POST['role_name']);
        $group_id = $_POST['group_id'];

        $val_string = [0,0,0,0,0,0,0,0,0,0,0];
        foreach ($createRole as $item) {
            $val_string[intval($item)-1] = 1;
        }
        $my_str = implode(",",$val_string);

        $qry = "INSERT INTO group_role (group_id,role_name,group_admin_panel_access,group_member_add_power,group_member_remove_power,group_member_upgrade_power,group_modify_power,group_delete_power,group_notice_post_power,group_notice_delete_power,group_notice_pin_power,group_email_power ,group_tweet_power)
                        VALUES ('$group_id','$role_name',$my_str)";
        $res = mysqli_query($conn,$qry);

        if($res){
            echo "<script>
                    alert('You created new role successfully.');                    
                    window.history.go(-1);
                  </script>";
        }else{
            echo "<script>
                    alert('Sorry, Unable to create new role.');
                    window.history.go(-1);
                    </script>";
        }
    }

    if (isset($_POST['create_role']) && isset($_POST['group_id'])) {
        createRole($conn);
    }

}
?>
