<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 9/2/16
 * Time: 4:59 PM
 */

$conn = null;
require_once("config.conf");
require_once("../database/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])){
    header("location:../groups.php");
}else {


    if (isset($_POST['upload_batch_json'])) {

        # code...
        if ($_FILES['readFile']['size']) {

            //Upload json file and read it
            $files = $_FILES['readFile']['tmp_name'];
            $jsonf = file_get_contents($files);
            $jsondata = (array)json_decode($jsonf, true);


            $tableName = mysqli_escape_string($conn, $_POST['batch']);

            $sql_to_table = "CREATE TABLE IF NOT EXISTS $tableName (
				    reg_num VARCHAR(10) NOT NULL,
				    index_num VARCHAR(10) NOT NULL,
				    account VARCHAR(5) NOT NULL DEFAULT 0,
				    PRIMARY KEY (reg_num,index_num)
				)";

            $response = mysqli_query($conn, $sql_to_table);

            if ($response) {

                // Input results to database
                $sql_pre = "INSERT INTO $tableName(reg_num,index_num) VALUES";
                $stringlist = array();
                foreach ($jsondata as $row) {
                    # code...
                    $individual_reg = $row['registration_number'];
                    $individual_index = $row['index_number'];
                    $stringlist[] = "('$individual_reg','$individual_index')";

                }

                $sql_pre .= implode(",", $stringlist);

                $final_res = mysqli_query($conn, $sql_pre);

                if ($final_res) {

                    header("location:".$_SERVER['HTTP_REFERER']);

                } else {
                    if (mysqli_errno($conn) == 1062) {
                        echo "You already have entered these data or uploaded file not match required format.";
                    } elseif (mysqli_errno($conn) == 1064) {
                        echo "Batch name should not be number";
                    } else {
                        echo "Error! , Contact administration";
                    }
                }
            }

        }

    }
}