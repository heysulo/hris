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

//    --------------------------------------- Add Batch ------------------------------------------

    if (isset($_POST['upload_batch_json'])) {

        # code...
        if ($_FILES['readFile']['size']) {

            //Upload json file and read it
            $files = $_FILES['readFile']['tmp_name'];
            $jsonf = file_get_contents($files);
            $jsondata = (array)json_decode($jsonf, true);


            $tableName = mysqli_escape_string($conn, $_POST['batch']);

            $qry_to_up_list = "CREATE TABLE IF NOT EXISTS batchList(
				    batch VARCHAR(10) NOT NULL PRIMARY KEY)
				    ";

            $q =  mysqli_query($conn,$qry_to_up_list);
            if($q){
                $sql_to_insert = "INSERT INTO batchList(batch) VALUES ('$tableName')";
                $qq = mysqli_query($conn,$sql_to_insert);

                if($qq) {


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

                            //echo "swal('Success','You have successfully entered new batch details.','success')";
                            header("location:" . $_SERVER['HTTP_REFERER']);

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
                }else{
                    echo "You already have entered these data or uploaded file not match required format.";
                }
            }

        }

    }

//    ---------------------------------------------- Add subject ------------------------------------

    if (isset($_POST['add_subject'])) {
        # code...
        $title = mysqli_escape_string($conn,$_POST['title']);
        $course = mysqli_escape_string($conn,$_POST['course']);
        $code = mysqli_escape_string($conn,$_POST['code']);
        $credit = mysqli_escape_string($conn,$_POST['credit']);

        $ccode = $course.$code;

        mysqli_query($conn,"CREATE TABLE IF NOT EXISTS subject(
									subject_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
									title VARCHAR(250) NOT NULL ,
									subject_code VARCHAR(10) NOT NULL,
									course VARCHAR(10) NOT NULL,
									credit INT(11) NOT NULL
									)");

        $sql = "INSERT INTO subject(title,subject_code,course,credit) VALUES ('$title','$ccode','$course','$credit')";

        $res = mysqli_query($conn ,$sql);
        if ($res) {
            echo 'wade goda';
        }else{
            echo 'monwada bn me..';
            echo mysqli_error($conn);
        }
    }

//     -------------------------------------------- ajax request -------------------------------------
    if(isset($_POST['sub'])){
        $get = mysqli_escape_string($conn,$_POST['sub']);
        $mod = explode("_", $get);
        $course = $mod[1];
        $batch = $mod[0];
        $sql = "SELECT subject_code,title FROM subject WHERE course='$course'";
        $query = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_assoc($query)) {

            echo "<input type='checkbox' name='subjects[]' value=".$row['subject_code'].">".$row['subject_code']." - ".$row['title']."<br>";

        }
    }

// TODO
//    generate gpz unction


}