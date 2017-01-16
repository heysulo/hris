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

        .divcss{
            width: calc(100% - 60px);
            background-color: white;
            max-height: 400px;
            text-overflow: ellipsis;
            word-wrap: break-word;
            overflow: scroll;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>

</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
    <?php //include_once('../templates/bottom_panel.php'); ?>
    <div class="bottomPanel" style="height: 100%;">


        <div class="group_div_content" id="tab_batch">
            <div class="dbox group_tab_members group_members_dbox">

                <?php if($_SESSION['system_admin_panel_access']){?>
                    <!-------------------------------ADD degree wise details--------------------------->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Added Details</div>
                        <div class="group_administration_content_field_value">

                            <?php

                            if (isset($_POST['add_gpa_list'])) {
                                if ($_FILES['readFile']['size']) {
                                    $files = $_FILES['readFile']['tmp_name'];
                                    $jsonf = file_get_contents($files);
                                    $jsondata = (array)json_decode($jsonf,true);

                                    ?>

                                    <div style="height: 1000px; " class="divcss">
                                        <table>
                                            <tr>
                                                <th>Registration Number</th>
                                                <th>Index Number</th>
                                            </tr>


                                            <?php foreach ($jsondata as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['registration_number']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['index_number']; ?>
                                                    </td>

                                                </tr>
                                            <?php }?>

                                        </table>
                                    </div>
                                    <?php

                                    $batch = mysqli_escape_string($conn,$_POST['batch']);
                                    $degree = mysqli_escape_string($conn,$_POST['degree']);

                                    $tableName = $batch."_".$degree;

                                    $sql_to_table = "CREATE TABLE IF NOT EXISTS $tableName (
                                                        reg_num VARCHAR(10) NOT NULL,
                                                        index_num VARCHAR(10) NOT NULL,
                                                        GPA FLOAT(10) NOT NULL DEFAULT '0.00',
                                                        rank int(10) NOT NULL DEFAULT 0,
                                                        PRIMARY KEY (reg_num,index_num)
                                                    )";

                                    mysqli_query($conn,"CREATE TABLE IF NOT EXISTS tablelist(tablename VARCHAR(10) NOT NULL PRIMARY KEY,sum_of_credit INT(10) NOT NULL DEFAULT 0)");

                                    mysqli_query($conn,"INSERT INTO tablelist VALUES('$tableName','0')");
                                    $response = mysqli_query($conn,$sql_to_table);

                                    if ($response) {

                                        # code...
                                        $sql_pre = "INSERT INTO $tableName(reg_num,index_num) VALUES";
                                        $stringlist = array();
                                        foreach ($jsondata as $row) {
                                            # code...
                                            $individual_reg = $row['registration_number'];
                                            $individual_index = $row['index_number'];
                                            $stringlist[] = "('$individual_reg','$individual_index')";

                                        }

                                        $sql_pre .= implode(",", $stringlist);

                                    }

                                    $final_res = mysqli_query($conn,$sql_pre);
                                    if ($final_res) {
                                        # code...
                                        echo "  <div class=\"alert-green\">
                                                        Results added.
                                                    </div>";

                                    } else {
                                        if (mysqli_errno($conn) == 1062) {
                                            echo " <div class=\"alert\">
                                                        You already have entered these data.
                                                    </div> ";
                                        }elseif (mysqli_errno($conn) == 1064) {
                                            echo "<div class=\"alert\">
                                                    Batch name should not be number
                                                </div>";}
                                        else {
                                            echo " <div class=\"alert\">
                                                        Error! , Contact administrations.
                                                    </div> ";
                                        }
                                    }

                                }

                            }

                            ?>

                        </div>
                    </div>


                <?php }?>


                <?php
                if(!($_SESSION['system_admin_panel_access'])){
                    echo "You dont have any permissions.";
                }
                ?>
                <br>
                <button class="msgbox_button" style="float: right;" onclick=" history.go(-1)">Back</button>
                <br>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>


</body>
</html>

