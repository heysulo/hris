<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['submit']) && isset($_SESSION['email'])) {
    updateUser();
} else {
    header("location:../index.php");
}

function updateUser()
{

    $conn = null;
    require_once("../config.conf");
    require_once("../../database/database.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    $mem_id = $_SESSION['user_id'];
    //Get profile picture..
    $imageUploaded = false;

    if (isset($_FILES['pro_pic_img'])) {
        $targetDir = "../../images/pro_pic/";
        $uploadImgName = $_FILES['pro_pic_img']['name'];
        $uploadImgSize = $_FILES['pro_pic_img']['size'];

        if (is_uploaded_file($_FILES['pro_pic_img']['tmp_name'])) {

            //Chnage uploaded file name
            $un = $_SESSION['fname'];
            $preFix = substr(strtolower($un), 0, 2);
            $imgExtention = strtolower(pathinfo($uploadImgName, PATHINFO_EXTENSION));
            if ($imgExtention == 'jpg' || $imgExtention == 'JPG' || $imgExtention == 'png' || $imgExtention == 'jpeg' || $imgExtention == 'JPEG' || $imgExtention == 'jpe') {

                $userImg = $preFix . rand(1000, 1000000) . "." . $imgExtention;
                $targetFile = $targetDir . $userImg;

                if ($uploadImgSize < 5000000 AND $uploadImgSize > 0) {
                    if (!move_uploaded_file($_FILES['pro_pic_img']['tmp_name'], $targetFile)) {
                        echo "Image not moved. ";
                    } else {
                        $imageUploaded = true;
                        $qry_to_update_pro_pic = "UPDATE member SET profile_picture='$userImg' WHERE member_id ='$mem_id'";
                        if(!mysqli_query($conn,$qry_to_update_pro_pic)){
                            echo mysqli_error($conn);
                        }
                    }
                } else {
                    echo "Not valid image.";
                }

            } else {
                echo "Not valid image type.";
            }

        } else {
            echo "Not valid image.";
        }

    } else {
        $imageUploaded = true;
    }

    //Get basic data
    $email = mysqli_escape_string($conn,$_POST['email']);

    $fname = mysqli_real_escape_string($conn, $_POST['firstName']);

    $mname = mysqli_real_escape_string($conn, $_POST['middlename']);

    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);

    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $userbirthDay = mysqli_real_escape_string($conn, $_POST['user_birth_day']);

    $current_city = mysqli_real_escape_string($conn, $_POST['current_city']);

    $hometown = mysqli_real_escape_string($conn, $_POST['hometown']);

    $contactInfo = $_POST['contactInfo'];

    $about_me = mysqli_escape_string($conn, $_POST['about_me']);

    $interestSkills = $_POST['interestSkillItem'];
/*
    $qry_to_insert = "INSERT INTO member(email,first_name,middle_name,last_name,category,gender,date_of_birth,current_city,home_town,about) VALUES ('$email','$fname','$mname','$lname','$category','$gender','$userbirthDay','$current_city','$hometown','$about_me')";


    if ($imageUploaded) {

        // Add basic member details
        $response = mysqli_query($conn, $qry_to_insert);

        if ($response) {

            if (!empty(array_filter($contactInfo))) {

                //Add memeber information
                $qry_to_insert_info = "INSERT INTO member_info(member_id,category,field,f_val) VALUES ";
                $arr = [];
                foreach ($contactInfo as $title => $des) {
                    $title = mysqli_escape_string($conn, $title);
                    $des = mysqli_escape_string($conn, $des);
                    $arr[] = "('$mem_id','1','$title','$des')";
                }
                $qry_to_insert_info .= implode(',', $arr);
                $response_from_info = mysqli_query($conn, $qry_to_insert_info);

                if (!$response_from_info) {
                    echo mysqli_error($conn);
                }

            }

            //Add member interest and skills
            if (!empty(array_filter($interestSkills))) {

                $qry_to_insert_skill = "INSERT INTO skill_interest(member_id,skill) VALUES ";
                $arr2 = [];
                foreach ($interestSkills as $key => $data) {
                    $data = mysqli_escape_string($conn, $data);
                    $arr2[] = "('$mem_id','$data')";
                }
                $qry_to_insert_skill .= implode(',', $arr2);
                $response_from_skill = mysqli_query($conn, $qry_to_insert_skill);

                if (!$response_from_skill) {
                    echo mysqli_error($conn);
                }
            }

            //Remove request details from server.
            $qry_to_remove_request = "DELETE FROM invitation WHERE email='$email'";
            $response_from_remove = mysqli_query($conn, $qry_to_remove_request);

            if ($response_from_remove) {
                if (session_destroy()) {
                    header("location:../../index.php");
                }
            } else {
                echo mysqli_error($conn);
            }

        } else {
            //header("location:index.php");
            echo mysqli_error($conn);
            echo $qry_to_insert;
        }

    } else {
        echo "Profile picture upload error.";
    }
*/
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

