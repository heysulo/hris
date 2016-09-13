<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("config.conf");
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


    ?>
    <title>HRIS | Groups</title>
</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <div class="bottomPanel">

        <div style="float:left;width:auto;">

            <!--Groups member manage-->
            <div class="txt_paneltitle">GROUPS YOU MANAGE</div>
            <div style="margin-left: 30px;">
                <input type="button" value="+ Create New Group" class="green_btn" onclick="window.location.href='createGroup.php';" style="font-weight: 600; color: white">
            </div>

            <div style="float: left; margin-left: 20px;s " id="managedGroup">

                <?php
                //get group details according to user
                $qry_to_get_group_ids = "SELECT * FROM groups WHERE creator ='".$_SESSION['user_id']."'";
                $group_details = mysqli_query($conn, $qry_to_get_group_ids);

                while($row = mysqli_fetch_assoc($group_details)){
                    $path = '../images/group/'.$row['logo'];
                    ?>

                    <div class="dbox group_manage_group_dbox" style="border-top-color: <?php echo $row['color'] ?>;" id='<?php echo $row['group_id'] ?>'>
                        <div class="group_manage_group_dbox_image" style="background-image: url('<?php echo $path?>'); border-top-color: <?php echo $row['color'] ?>;"></div>
                        <div class="group_dbox_title"><?php echo $row['name'] ?></div>
                        <div class="group_dbox_category"><?php echo $row['category'] ?></div>
                    </div>

                    <!--<div class="dbox group_group_dbox" style="border-top-color: <?php /*echo $row['color'] */?>;" id='<?php /*echo $row['group_id'] */?>'>
                        <div class="group_group_dbox_image" style="background-image: url('<?php /*echo $path*/?>'); border-top-color: <?php /*echo $row['color'] */?>;"></div>
                        <div class="group_dbox_title"><?php /*echo $row['name'] */?></div>

                        <div class="group_dbox_category"><?php /*echo $row['category'] */?></div>
                        <div class="group_dbox_description"><?php /*echo $row['description'] */?></div>
                    </div>-->

                <?php } ?>

            </div>

        </div>

        <div class="profile_section_main groups_content_area"></div>

        <!--My groups -->
        <div style="float:left;width:auto;">
            <div class="txt_paneltitle"> GROUPS YOU'RE IN </div>
            <div style="float: left; margin-left: 20px;s " id="mygroups">

                <?php
                //get group details according to user
                $qry_to_get_group_ids = "SELECT group_id FROM group_member WHERE member_id ='".$_SESSION['user_id']."'";
                $group_ids = mysqli_query($conn, $qry_to_get_group_ids);

                while($gid = mysqli_fetch_assoc($group_ids)){
                    $qry_to_get_groups = "SELECT * FROM groups WHERE group_id='".$gid['group_id']."'";
                    $res = mysqli_query($conn,$qry_to_get_groups);

                    $row = mysqli_fetch_assoc($res);
                    $path = '../images/group/'.$row['logo'];
                ?>

                    <div class="dbox group_group_dbox" style="border-top-color: <?php echo $row['color'] ?>;" id='<?php echo $row['group_id'] ?>'>
                        <div class="group_group_dbox_image" style="background-image: url('<?php echo $path?>'); border-top-color: <?php echo $row['color'] ?>;"></div>
                        <div class="group_dbox_title"><?php echo $row['name'] ?></div>

                        <div class="group_dbox_category"><?php echo $row['category'] ?></div>
                        <div class="group_dbox_description"><?php echo $row['description'] ?></div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <div class="profile_section_main groups_content_area"></div>

        <!--All groups -->
        <div style="float:left;width:auto;">
            <div class="txt_paneltitle">ALL GROUPS</div>
            <div style="float: left; margin-left: 20px; " id="allgroups">

                <?php
                //get group details
                $qry_get_groups = "SELECT * FROM groups";
                $res = mysqli_query($conn,$qry_get_groups);
                while($row = mysqli_fetch_assoc($res)){
                    $path = '../images/group/'.$row['logo'];
                    ?>


                    <div class="dbox group_group_dbox" style="border-top-color: <?php echo $row['color'] ?>;" id='<?php echo $row['group_id'] ?>'>
                        <div class="group_group_dbox_image" style="background-image: url('<?php echo $path?>');"></div>
                        <div class="group_dbox_title"><?php echo $row['name'] ?></div>

                        <div class="group_dbox_category"><?php echo $row['category'] ?></div>
                        <div class="group_dbox_description"><?php echo $row['description'] ?></div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>

<script>
    $('#mygroups').on('click','.group_group_dbox',function () {
        var id = $(this).attr('id');
        var dir = window.location.pathname;
        var new_dir = dir.replace('groups.php','');
        window.location.replace(new_dir+'mygroup.php?group='+id);
    });

    $('#allgroups').on('click','.group_group_dbox',function () {
        var id = $(this).attr('id');
        var dir = window.location.pathname;
        var new_dir = dir.replace('groups.php','');
        window.location.replace(new_dir+'mygroup.php?group='+id);
    });

    $('#managedGroup').on('click','.group_manage_group_dbox',function () {
        var id = $(this).attr('id');
        var dir = window.location.pathname;
        var new_dir = dir.replace('groups.php','');
        window.location.replace(new_dir+'mygroup.php?group='+id);
    });

</script>

    </body>
</html>