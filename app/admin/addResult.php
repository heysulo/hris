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
                    <!-------------------------------ADD Subject Details--------------------------->
                    <div class="group_administration_content_field">
                        <div class="group_administration_content_field_name">Add Subject Details</div>
                        <div class="group_administration_content_field_value">

                            <?php

                            if (isset($_POST['add_result'])) {

                                $subject = mysqli_escape_string($conn, $_POST['subject']);
                                $batch = mysqli_escape_string($conn, $_POST['batch']);
                                $bb = ltrim($batch, 'B');

                                # read file ...
                                if ($_FILES['readFile']['size']) {
                                    # show in table ...
                                    $files = $_FILES['readFile']['tmp_name'];
                                    $json_f = file_get_contents($files);
                                    $json_data = (array)json_decode($json_f, true);
                                    $createTable = true;

                                    $jsonFile = array();
                                    ?>
                                    <div>
                                        Subject : <?php echo $subject ?> &nbsp; &nbsp; &nbsp; &nbsp;
                                        Batch : <?php echo $bb ?>

                                    </div>

                                    <div style="height: 1000px; " class="divcss">
                                        <table>
                                            <tr>
                                                <th>Index number</th>
                                                <th>Result</th>
                                            </tr>


                                            <?php foreach ($json_data as $row) {

                                                $index = $row['index_number'];
                                                $sub = $row[$subject];
                                                if($sub == ""){die("<div class='alert'> Inserted json file not correct formated. </div>");}
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $index; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $sub; ?>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                        </table>
                                    </div>
                                    <?php

                                    // Create table and add data...
                                    $batch = mysqli_escape_string($conn, $_POST['batch']);
                                    $tableName = mysqli_escape_string($conn, $_POST['subject']);
                                    $sql_to_table = "CREATE TABLE IF NOT EXISTS $tableName (
                                                        batch VARCHAR (6) NOT NULL,
                                                        index_num VARCHAR (10) NOT NULL,
                                                        result VARCHAR(5) NOT NULL,
                                                        cpv FLOAT NOT NULL,
                                                        gpv FLOAT NOT NULL,
                                                        PRIMARY KEY (batch,index_num)
                                                    )";

                                    $response = mysqli_query($conn, $sql_to_table);

                                    if ($response) {

                                        $sql_to_get_credits = "SELECT credit FROM subject WHERE subject_code='$tableName'";
                                        $q_credit = mysqli_query($conn, $sql_to_get_credits);
                                        $res_credit = mysqli_fetch_assoc($q_credit);
                                        $credit = $res_credit['credit'];


                                        $sql_pre = "INSERT INTO $tableName(batch,index_num,result,cpv,gpv) VALUES";
                                        $stringlist = array();
                                        foreach ($json_data as $row) {
                                            # code...
                                            $cpv = 0;
                                            $individual_index = $row['index_number'];
                                            $individual_res = $row[$subject];
                                            switch ($individual_res) {
                                                case 'A+':
                                                    $cpv = 4;
                                                    break;
                                                case 'A':
                                                    $cpv = 4;
                                                    break;
                                                case 'A-':
                                                    $cpv = 3.75;
                                                    break;
                                                case 'B+':
                                                    $cpv = 3.25;
                                                    break;
                                                case 'B':
                                                    $cpv = 3;
                                                    break;
                                                case 'B-':
                                                    $cpv = 2.75;
                                                    break;
                                                case 'C+':
                                                    $cpv = 2.25;
                                                    break;
                                                case 'C':
                                                    $cpv = 2;
                                                    break;
                                                case 'C-':
                                                    $cpv = 1.75;
                                                    break;
                                                case 'D+':
                                                    $cpv = 1.25;
                                                    break;
                                                case 'D':
                                                    $cpv = 1;
                                                    break;
                                                case 'D-':
                                                    $cpv = 0.75;
                                                    break;
                                                case 'E':
                                                    $cpv = 0;
                                                    break;
                                                default:
                                                    $cpv = 0;
                                                    break;
                                            }

                                            $gpv = $cpv * $credit;
                                            $stringlist[] = "('$batch','$individual_index','$individual_res','$cpv','$gpv')";

                                        }

                                        $sql_pre .= implode(",", $stringlist);

                                        $final_res = mysqli_query($conn, $sql_pre);
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
                                            } else {
                                                echo mysqli_error($conn);
                                                echo " <div class=\"alert\">
                                                        Error! , Contact administrations.
                                                    </div> ";
                                            }

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