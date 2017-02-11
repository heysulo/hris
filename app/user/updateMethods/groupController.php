<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header("location:../../index.php");
}else {
    $conn = null;
    require_once("../config.conf");
    require_once("../../database/database.php");
    function createRole($conn)
    {
        //Get user inputs
        $createRole = mysqli_escape_string($conn,$_POST['createRole']);
        $role_name = mysqli_escape_string($conn,$_POST['role_name']);
        $group_id = mysqli_escape_string($conn,$_POST['group_id']);
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
    function deleteRole($conn)
    {
        //Get user inputs
        $role = mysqli_escape_string($conn,$_POST['role']);
        $group_id = mysqli_escape_string($conn,$_POST['group']);
        $qry = "DELETE FROM group_role WHERE role_id='$role' and group_id='$group_id'";
        $res = mysqli_query($conn,$qry);
        if($res){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
    function acceptMemberRequest($conn){
        //Get user id and group id
        $request_id = mysqli_escape_string($conn,$_POST['req_id']);
        $group_id = mysqli_escape_string($conn,$_POST['group']);
        //Get requester id
        $sql_get_requester = "SELECT member_id FROM group_member_request WHERE group_id='$group_id' AND request_id ='$request_id'";
        $res = mysqli_query($conn,$sql_get_requester);
        if(mysqli_num_rows($res)){
            $temp = mysqli_fetch_assoc($res);
            $user_id = $temp['member_id'];
            //Set auto commit false
            mysqli_autocommit($conn,false);
            try{
                $group_member_add = "INSERT INTO group_member(group_id,member_id,role,description,join_date) VALUES ('$group_id','$user_id','Member','Member of group',NOW())";
                $response = mysqli_query($conn,$group_member_add);
                if($response){
                    $qry_to_remove_requset = "DELETE FROM group_member_request WHERE request_id='$request_id'";
                    $res = mysqli_query($conn,$qry_to_remove_requset);
                    mysqli_commit($conn);
                    mysqli_close($conn);
                    if($res){
                        echo json_encode(true);
                    }else{
                        echo json_encode(false);
                    }
                }else{
                    echo json_encode(false);
                }
            }catch(Exception $exception){
                mysqli_rollback($conn);
            }
        }else{
            echo json_encode(false);;
        }
    }
    function ignoreMemberRequest($conn){
        //Get user id and group id
        $request_id = mysqli_escape_string($conn,$_POST['req_id']);
        $group_id = mysqli_escape_string($conn,$_POST['group']);
        //Get requester id
        $sql_get_requester = "SELECT member_id FROM group_member_request WHERE group_id='$group_id' AND request_id ='$request_id'";
        $res = mysqli_query($conn,$sql_get_requester);
        if(mysqli_num_rows($res)){
            $qry_to_ignore_request = "DELETE FROM group_member_request WHERE request_id='$request_id'";
            if(mysqli_query($conn,$qry_to_ignore_request)){
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }
        }else{
            echo json_encode(false);
        }
    }

    function addNewMember($conn){
        //Get user id and group id
        $email = mysqli_escape_string($conn,$_POST['member']);
        $group_id = mysqli_escape_string($conn,$_POST['group']);

        //Get member id
        $sql_get_member = "SELECT member_id FROM member WHERE email='$email'";
        $res = mysqli_query($conn,$sql_get_member);
        if(mysqli_num_rows($res)){
            $r = mysqli_fetch_assoc($res);
            $mem_id = $r['member_id'];
            $qry_to_add_member = "INSERT INTO group_member(`group_id`, `member_id`, `role`, `description`, `join_date`) VALUES ('$group_id','$mem_id','Member','Member of group',NOW())";
            if(mysqli_query($conn,$qry_to_add_member)){
                echo json_encode([true,'Done']);
            }else{
                echo json_encode([false,'Fail']);
            }
        }else{
            echo json_encode([false,'No']);
        }

    }

    function removeMember($conn){
        //Get user id and group id
        $email = mysqli_escape_string($conn,$_POST['member']);
        $group_id = mysqli_escape_string($conn,$_POST['group']);

        //Get member id
        $sql_get_member = "SELECT member_id FROM member WHERE email='$email'";
        $res = mysqli_query($conn,$sql_get_member);
        if(mysqli_num_rows($res)){
            $r = mysqli_fetch_assoc($res);
            $mem_id = $r['member_id'];
            $qry_to_add_member = "DELETE FROM group_member WHERE group_id='$group_id' and member_id='$mem_id'";
            if(mysqli_query($conn,$qry_to_add_member)){
                echo json_encode([true,'Done']);
            }else{
                echo json_encode([false,'Fail']);
            }
        }else{
            echo json_encode([false,'No']);
        }
    }

    function addTwitter($conn){

        $con_key = mysqli_escape_string($conn,$_POST['con_key']);
        $con_sec = mysqli_escape_string($conn,$_POST['con_sec']);
        $acc_key = mysqli_escape_string($conn,$_POST['acc_key']);
        $acc_sec = mysqli_escape_string($conn,$_POST['acc_sec']);
        $group_id = mysqli_escape_string($conn,$_POST['group']);

        $qry_to_add_twitter = "UPDATE groups SET `twitter_consumer_key`='$con_key' , `twitter_consumer_secret`='$con_sec', `twitter_access_token`='$acc_key', `twitter_access_token_secret`='$acc_sec' WHERE group_id='$group_id'";
        if(mysqli_query($conn,$qry_to_add_twitter)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }

    }


    if (isset($_POST['create_role']) && isset($_POST['group_id'])) {
        createRole($conn);
    }elseif (isset($_POST['group']) && isset($_POST['func']) && isset($_POST['role']) ) {
        deleteRole($conn);
    }elseif (isset($_POST['request']) && isset($_POST['group']) && isset($_POST['req_id'])){
        if($_POST['request'] == 'accept'){
            acceptMemberRequest($conn);
        }else if ($_POST['request'] == 'ignore'){
            ignoreMemberRequest($conn);
        }
    }elseif (isset($_POST['group']) && isset($_POST['func']) && isset($_POST['member']) ){
        switch ($_POST['func']){
            case 'add':
                addNewMember($conn);
                break;
            case 'remove':
                removeMember($conn);
                break;
        }
    }elseif (isset($_POST['group']) && isset($_POST['func'])){
        if($_POST['func'] == 'twitter'){
            addTwitter($conn);
        }
    }
}
?>