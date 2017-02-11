<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['email'])){
        header("location:../../index.php");
    }

    $conn = null;
    require_once("config.conf");
    require_once("../database/database.php");

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];

    ?>
    <title>HRIS | Administration</title>

    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: solid 3px white;
            text-align: center;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
    <div class="bottomPanel" style="height: 100%;">


        <div class="group_div_content" id="tab_batch">
            <div class="dbox group_tab_members group_members_dbox">

                <?php if($_SESSION['system_admin_panel_access']){?>

                    <!-------------------------------ADD NEW Batch--------------------------->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Add New Batch</div>
                        <div class="group_administration_content_field_value">
                            <form method="post" enctype="multipart/form-data" action="adminFunction.php" onsubmit="return validateBatchName()">
                                <input type="text" class="group_administration_txtbox" name="batch" placeholder="Ex : B2014" id="new_batch_name" required><br><br>
                                <span style="font-size: 12px">Please confirm uploaded data arranged correct format.<br> Json data should format to { 'index_number':14020646,'registration_number':2014/IS/99 } </span><br><br>
                                <input type="file" name="readFile" accept="application/json" required>
                                <button class="msgbox_button group_writer_button" name="upload_batch_json" type="submit" > Upload </button>
                            </form>

                        </div>

                    </div>

                    <div class="group_administration_content_field">
                        <div><h4>Current batch details</h4></div>


                        <table>
                            <tr>
                                <th><center>Batch</center></th>
                                <th colspan="2"><center>Number of student </center></th>
                                <th><center>Active Profiles </center> </th>
                            </tr>

                            <?php

                            $res = mysqli_query($conn,"SELECT * FROM batchList");
                            while($row = mysqli_fetch_assoc($res)){
                                $table = $row['batch'];

                                $year = trim($table,'B');

                                $sql_to_get_data = "SELECT COUNT(reg_num) AS stu_count,
                                                           SUM( CASE WHEN degree='IS' THEN 1 ELSE 0 END ) AS IS_stu,
                                                           SUM( CASE WHEN degree='CS' THEN 1 ELSE 0 END ) AS CS_stu,
                                                           SUM( CASE WHEN account=1 THEN 1 ELSE 0 END ) AS active_stu        
                                                    FROM $table";

                                $response = mysqli_query($conn,$sql_to_get_data);
                                $data = mysqli_fetch_assoc($response);

                                    $stu_count = $data['stu_count'];
                                    $is_stu = $data['IS_stu'];
                                    $cs_stu = $data['CS_stu'];
                                    $active = $data['active_stu'];

                                echo "  <tr>
                                            <td rowspan=\"2\"><center>$year</center> </td>
                                            <td rowspan=\"2\">$stu_count</td>
                                            <td style=\"font-size: .8em;padding: 4px\"> CS - $cs_stu</td>
                                            <td rowspan=\"2\">$active</td>
                                        </tr>
                                        <tr>
                                            <td style=\"font-size: .8em;padding: 4px\"> IS - $is_stu</td>
                                        </tr>";
                            }

                            ?>

<!--                            <tr>-->
<!--                                <td rowspan="2">2014</td>-->
<!--                                <td rowspan="2">86</td>-->
<!--                                <td style="font-size: .8em"> CS - 68</td>-->
<!--                                <td rowspan="2">56</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td style="font-size: .8em"> IS - 68</td>-->
<!--                            </tr>-->


                        </table>
                    </div>

                    <br>
                    <!-------------------------------Remove Batch Details--------------------------->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Remove Batch</div>
                        <div class="group_administration_content_field_value">
                            <form method="post"  action="adminFunction.php">
                                <span style="font-size: 12px;color: indianred">This action may cause to lose all data about batch.<br> Please check again before proceed.</span><br>
                                <br>
                                <?php
                                $q2 = mysqli_query($conn,"SELECT * FROM batchList");
                                if ($q2){?>
                                    <label for="batch_id"> Batch :
                                        <select name="batch"  id="batch_id" required>
                                            <option value="">-- Select --</option>
                                            <?php
                                            while($row = mysqli_fetch_assoc($q2)){
                                                $batch= $row['batch'];
                                                $bb = ltrim($batch,'B');
                                                echo "<option value='$batch'> $bb </option>";

                                            }?>
                                        </select>
                                    </label>
                                    <?php
                                }
                                ?>

                                <br><br>
                                <button class="msgbox_button group_writer_button red_button" name="remove_batch" type="submit" > Remove </button>
                            </form>

                        </div>

                    </div>

                <?php }?>

                <?php
                if(!($_SESSION['system_admin_panel_access'])){
                    echo "You dont have any permissions.";
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
    function validateBatchName() {
        var ss = $('#new_batch_name').val();
        var aa = ss.slice(0,1);
        if(aa == 'B'){
            return true;
        }else{
            swal('Error','Batch name not acceptable. Please use given format. Ex : B2014 ( First letter should be "B" and then batch year.)','error');
            return false;
        }
    }
</script>
</body>

