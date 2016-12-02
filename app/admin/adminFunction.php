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
                        degree VARCHAR (5) NOT NULL,
                        PRIMARY KEY (reg_num,index_num)
                    )";

                    $response = mysqli_query($conn, $sql_to_table);

                    if ($response) {

                        // Input results to database
                        $sql_pre = "INSERT INTO $tableName(reg_num,index_num,degree) VALUES";
                        $stringlist = array();
                        foreach ($jsondata as $row) {
                            # code...
                            $individual_reg = $row['registration_number'];
                            $individual_index = $row['index_number'];
                            $deg = explode('/',$individual_reg)[1];

                            $stringlist[] = "('$individual_reg','$individual_index','$deg')";

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

//    ----------------------------------------------- Remove Batch ------------------------------------

    if(isset($_POST['remove_batch'])){
        $batch = mysqli_escape_string($conn,$_POST['batch']);

        $sql_to_remove_from_batchList = "DELETE FROM batchList WHERE batch = '$batch'";
        $res = mysqli_query($conn,$sql_to_remove_from_batchList);
        if($res){
            $sql_to_drop_table = "DROP TABLE $batch";
            $resp = mysqli_query($conn,$sql_to_drop_table);
            if ($resp){
                echo "swal('Success','Batch details deleted.','success')";
                header("location:" . $_SERVER['HTTP_REFERER']);
            }else{
                echo mysqli_error($conn);
            }
        }else{
            echo mysqli_error($conn);
        }

    }

//    ---------------------------------------------- Add subject ------------------------------------

    if (isset($_POST['add_course'])) {
        # code...
        $title = mysqli_escape_string($conn,$_POST['title']);
        $degree = mysqli_escape_string($conn,$_POST['degree']);
        $code = mysqli_escape_string($conn,$_POST['code']);
        $credit = mysqli_escape_string($conn,$_POST['credit']);

        $ccode = $degree.$code;

        mysqli_query($conn,"CREATE TABLE IF NOT EXISTS course(
									course_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
									title VARCHAR(250) NOT NULL ,
									course_code VARCHAR(10) NOT NULL,
									degree VARCHAR(10) NOT NULL,
									credit INT(11) NOT NULL,
									UNIQUE (course_code)
									)");

        $sql = "INSERT INTO course(title,course_code,degree,credit) VALUES ('$title','$ccode','$degree','$credit')";

        $res = mysqli_query($conn ,$sql);
        if ($res) {
            echo 'Done';
        }else{
            if(mysqli_errno($conn) == 1062){
                echo "You already have entered these Course";
            }else{
                echo mysqli_error($conn);
            }
        }
    }

//     -------------------------------------------- ajax request -------------------------------------
    if(isset($_POST['sub'])){
        $get = mysqli_escape_string($conn,$_POST['sub']);
        $mod = explode("_", $get);
        $course = $mod[1];
        $batch = $mod[0];
        $sql = "SELECT course_code,title FROM course WHERE degree='$degree'";
        $query = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_assoc($query)) {

            echo "<input type='checkbox' name='subjects[]' value=".$row['course_code'].">".$row['course_code']." - ".$row['title']."<br>";

        }
    }

// TODO
//    generate gpz unction
    if(isset($_POST['generate_gpa'])){
        $course_batch = mysqli_escape_string($conn,$_POST['course_batch']);

        $subjects = $_POST['subjects'];
        foreach ($subjects as $subject) {

            $sql_to_alter_gpa_table = "ALTER TABLE $course_batch ADD $subject FLOAT(10)";
            $qu = mysqli_query($conn,$sql_to_alter_gpa_table);
            if($qu){
                echo "New column added ";

                $sql_to_insert_gpv_val =  "	UPDATE $course_batch
						    INNER join
					         $subject
					         on $course_batch.index_num = $subject.index_num
						    set $subject = $subject.gpv
						         ";

                $res = mysqli_query($conn,$sql_to_insert_gpv_val);
                if($res){
                    echo "data passed";
                    $cr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT credit FROM subject WHERE subject_code = '$subject'"));
                    $final_q = mysqli_query($conn,"UPDATE tablelist SET sum_of_credit = sum_of_credit +".$cr['credit']." WHERE tablename = '$course_batch'");
                    if ($final_q) {
                        echo " tablelist updated";
                    }else{
                        echo mysqli_error($conn);
                    }
                }else{
                    echo mysqli_error($conn);
                }

            }elseif(mysqli_errno($conn) == 1060){
                echo "Subject $subject is already added to GPA calculation.";
            }else{
                echo mysqli_errno($conn);
            }


        }




    }

    if(isset($_POST['update_gpa'])){
        $course_batch = mysqli_escape_string($conn,$_POST['course_batch']);

        //SQL to get subjects
        $qry = mysqli_query($conn,"SELECT * FROM $course_batch LIMIT 2");
        if($qry){
            $list = arraY();
            while($col_name = mysqli_fetch_field($qry)){
                $name = $col_name->name;
                if($name != 'reg_num' AND $name != 'index_num' AND $name != 'GPA' AND $name != 'rank'){
                    $list[] = $name;
                }
            }

            //Get total credits
            $sql_to_get_total = "SELECT sum_of_credit FROM tablelist WHERE tablename = '$course_batch'";
            $q = mysqli_query($conn,$sql_to_get_total);
            $res = mysqli_fetch_assoc($q);

            $sql_to_update = "UPDATE $course_batch SET GPA = ROUND((";
            $sql_to_update .= implode("+", $list);
            $sql_to_update .= ")/".$res['sum_of_credit'].",4)";

            if(mysqli_query($conn, $sql_to_update)){
                echo "GPA Calculated";

                $sql_to_ranking = "UPDATE $course_batch JOIN 
								  (SELECT index_num, GPA, 
								 	(SELECT COUNT(*)+1 FROM $course_batch WHERE GPA>x.GPA) AS rank_upper 
							 	   FROM $course_batch x) a 
							 	   ON (a.index_num = $course_batch.index_num) 
							 	   SET $course_batch.rank = a.rank_upper";

                $res_rank = mysqli_query($conn,$sql_to_ranking);
                if($res_rank){
                    echo " Ranking done";
                }else{
                    echo mysqli_error($conn);
                }

            }else{
                echo mysqli_error($conn);
            }

        }


    }



}