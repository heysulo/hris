<!DOCTYPE html>
<head>
    <?php
    define(hris_access,true);
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
            <div class="txt_paneltitle">GROUPS YOU MANAGE</div>
            <div style="margin-left: 30px;">
                <input type="button" value="+ Create New Group" class="green_btn" onclick="window.location.href='createGroup.php';" style="font-weight: 600; color: white">
            </div>
        </div>

        <div class="profile_section_main groups_content_area"></div>

        <!--My groups -->
        <div style="float:left;width:auto;">
            <div class="txt_paneltitle"> GROUPS YOU'RE IN </div>
            <div style="float: left; margin-left: 20px;s " id="mygroups">

                <?php
                //get group details according to user
                $qry_to_get_groups = "SELECT * FROM groups WHERE group_id=(SELECT group_id FROM group_members WHERE member_id ='".$_SESSION['user_id']."')";
                $res = mysqli_query($conn,$qry_to_get_groups);
                while($row = mysqli_fetch_assoc($res)){
                    echo "<div class=\"dbox listed_group\" style=\"float: left; width: 300px;\" id='".$row['group_id']."'>";
                    echo "<div style='padding:3px;'><b>".$row['g_name']."</b></div>";
                    echo "<div style='padding:3px;'>Category : ".$row['g_category']."</div>";
                    echo "<div style='font-size:12px; padding: 5px;'>".$row['g_description']."</div>";
                    echo "</div>";
                }
                ?>

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
                    echo "<div class=\"dbox listed_group\" style=\"float: left; width: 300px;\" id='".$row['group_id']."'>";
                    echo " <div style='padding: 3px;'><b>".$row['g_name']."</b></div>";
                    echo " <div style='padding: 3px;'>Category : ".$row['g_category']."</div>";
                    echo "<div style='font-size: 12px; padding: 5px;'>".$row['g_description']."</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>

<script>
    $('#mygroups').on('click','.listed_group',function () {
        var id = $(this).attr('id');
        var dir = window.location.pathname;
        var new_dir = dir.replace('groups.php','');
        window.location.replace(new_dir+'mygroup.php?group='+id);
    });
</script>

    </body>
</html>