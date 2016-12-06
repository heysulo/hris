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

        <div class="group_main_menu">
            <ul>
                <li class="group_main_menu_item group_main_menu_item_active" id="main_menu_course" onclick="activate_tab(1);">Course</li>
                <li class="group_main_menu_item" id="main_menu_result" onclick="activate_tab(2);">Result</li>
                <li class="group_main_menu_item" id="main_menu_analysis" onclick="activate_tab(3);">Analytics</li>
            </ul>
        </div>

        <div class="group_div_content" id="tab_batch">
            <div class="dbox group_tab_members group_members_dbox">

                <?php if($_SESSION['system_admin_panel_access']){?>
                    <!-------------------------------ADD Course Details--------------------------->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Add Course</div>
                        <div class="group_administration_content_field_value">

                            <form action="adminFunction.php" method="POST">
                                <label>Course :
                                    <input type="text" class="group_administration_txtbox" name="title" placeholder="ex : Information System" required>
                                </label><br>

                                <label> Select Degree Program :</label>
                                <select name="degree" class="group_administration_txtbox" required>
                                    <option value=""> -- Select -- </option>
                                    <option value="IS">Information System</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="SE">Software Engineering</option>
                                </select>
                                <br>

                                <label>Course Code:
                                    <input type="text" class="group_administration_txtbox" id="course_code" name="code" placeholder="ex : 1010" required>
                                </label>
                                <br>

                                <label>Credits:
                                    <input type="number" class="group_administration_txtbox" name="credit" min="1" max="4" required>
                                </label>

                                <br><br>
                                <input type="submit" name="add_course" class="msgbox_button group_writer_button" value="Add Course">
                            </form>


                        </div>
                    </div>

                    <br>
                    <div class="group_administration_content_field">

                        <h4>Course Details</h4>

                        <table>
                            <tr>
                                <th> Course Code </th>
                                <th> Description </th>
                                <th> Degree Program </th>
                                <th> Credits </th>
                            </tr>

                            <?php

                            $res = mysqli_query($conn,"SELECT * FROM course ORDER BY course_code ASC ");
                            while($data = mysqli_fetch_assoc($res)){

                                $code= $data['course_code'];
                                $desc = $data['title'];
                                $degree = $data['degree'];
                                $credit = $data['credit'];

                                echo "  <tr>
                                            <td> $code</td>
                                            <td> $desc </td>
                                            <td> $degree</td>
                                            <td> $credit </td>
                                        </tr>";
                            }

                            ?>

<!--                            <tr>-->
<!--                                <td> 1001 </td>-->
<!--                                <td> Information System</td>-->
<!--                                <td> IS </td>-->
<!--                                <td> 3 </td>-->
<!--                            </tr>-->

                        </table>
                    </div>



                <?php }?>



                <?php
                if(!($_SESSION['system_admin_panel_access'])){
                    echo "You dont have any permissions.";
                }
                ?>
            </div>
        </div>

<!--        Result and GPA functionalities shows here-->
        <div class="group_div_content" id="tab_result">
            <div class="dbox group_tab_members group_members_dbox">

                <?php if($_SESSION['system_admin_panel_access']){?>
                <!-------------------------------ADD Results--------------------------->
                <div class="group_administration_content_field">
                    <div class="group_administration_content_field_name">Add Results</div>
                    <div class="group_administration_content_field_value">

                        <form action="addResult.php" method="post" enctype="multipart/form-data">

                            <?php
                            $q = mysqli_query($conn,"SELECT * FROM course");
                            if ($q){?>
                                <label for="course_id"> Course :
                                    <select name="course"  id="course_id" required>
                                        <option value="">-- Select --</option>
                                        <?php
                                        while($row = mysqli_fetch_assoc($q)){
                                            $course_title = $row['title'];
                                            $course_code = $row['course_code'];

                                            echo "<option value='$course_code'> $course_code - $course_title </option>";

                                        }?>
                                    </select>
                                </label>
                                <?php
                            }
                            ?>

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


                            <br>
                            <span style="font-size: 12px">Please confirm uploading data arranged correct format.<br> Json data should format to { 'index_number':14020646,'IS1001':'B+' } </span><br><br>
                            <input type="file" name="readFile" accept="application/json"><br><br>
                            <input type="submit" name="add_result" value="Upload" class="msgbox_button group_writer_button">

                        </form>
                    </div>
                </div>


                    <!-- ----------------------------- Add GPA table ------------------------- -->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Add GPA List </div>
                        <div class="group_administration_content_field_value">

                            <form action="addGPAList.php" method="post" enctype="multipart/form-data">

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
                                <label> Degree Program :
                                    <select name="degree" class="group_administration_txtbox" required>
                                        <option value=""> -- Select -- </option>
                                        <option value="IS">Information System</option>
                                        <option value="CS">Computer Science</option>
                                        <option value="SE">Software Engineering</option>
                                    </select>
                                </label><br>

                                <span style="font-size: 12px">Please confirm uploading data arranged correct format.<br> Json data should format to { 'index_number':14020646,'registration_number':'2014IS099' } </span><br><br>

                                <input type="file" name="readFile" accept="application/json">

                                <br><br>
                                <input type="submit" name="add_gpa_list" value=" Upload " class="msgbox_button group_writer_button">


                            </form>
                        </div>
                    </div>
                    <br>

                    <!-- ----------------------------- Generate GPA ------------------------- -->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Generate GPA </div>
                        <div class="group_administration_content_field_value">

                            <form action="adminFunction.php" method="post">

                                <label>
                                    SELECT Course and batch :
                                </label>
                                <select name="course_batch" id='course_batch'>
                                    <option>-- SELECT --</option>
                                    <?php
                                    $r = mysqli_query($conn,"SELECT tablename FROM tablelist");

                                    while ($row = mysqli_fetch_assoc($r)) {
                                        $val = $row['tablename'];
                                        $val_a = explode("_", $val);
                                        $yearb = $val_a[0];
                                        $year = ltrim($yearb,"B");
                                        $co = $val_a[1];
                                        ?>

                                        <option value=<?php echo $val?> > <?php echo $year." - ".$co ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>

                                <div id="checkBox">
                                    <!-- Subjects are list down in here -->
                                </div>

                                <input type="submit" name="generate_gpa" value=" Generate " class="msgbox_button group_writer_button">


                            </form>
                        </div>
                    </div>
                    <br>

                    <!-- ----------------------------- Update GPA ------------------------- -->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Update GPA </div>
                        <div class="group_administration_content_field_value">

                            <form action="adminFunction.php" method="post">

                                <label>
                                    SELECT Course and batch :
                                </label>
                                <select name="course_batch" id='course_batch'>
                                    <option>-- SELECT --</option>
                                    <?php
                                    $r = mysqli_query($conn,"SELECT tablename FROM tablelist");

                                    while ($row = mysqli_fetch_assoc($r)) {
                                        $val = $row['tablename'];
                                        $val_a = explode("_", $val);
                                        $yearb = $val_a[0];
                                        $year = ltrim($yearb,"B");
                                        $co = $val_a[1];
                                        ?>

                                        <option value=<?php echo $val?> > <?php echo $year." - ".$co ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                                <br>
                                <input type="submit" name="update_gpa" value=" Update " class="msgbox_button group_writer_button">


                            </form>
                        </div>
                    </div>

                <?php }?>

            </div>
        </div>
    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>

<script>
    $('#course_code').keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }

    });

    $('#course_batch').change(function(){
        var valw = this.value;

        $.ajax({
            url:"adminFunction.php",
            type:'POST',
            data:{'sub':valw},
            success:function(res){

                $('#checkBox').html(res);

            }
        });

    });

</script>

</body>
</html>