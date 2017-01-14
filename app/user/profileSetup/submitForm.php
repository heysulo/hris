<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['submit']) && isset($_SESSION['email'])){
    createUser();
}else{
    header("location:index.php");
}

function createUser(){

    $conn = null;
    require_once("../config.conf");
    require_once ("../../database/database.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get password and hash it.
    $pword = mysqli_real_escape_string($conn,$_POST['password']);
    $c_password = mysqli_real_escape_string($conn,$_POST['com_pw']);

    if($pword != $c_password){
        header("location:setupProfile.php");
    }else{
        $password = password_hash($pword,PASSWORD_DEFAULT);
    }

    //Get profile picture..

    if(isset($_FILES['pro_pic_img'])){
        $targetDir = "../../images/pro_pic/";
        $uploadImgName = $_FILES['pro_pic_img']['name'];
        $uploadImgSize = $_FILES['pro_pic_img']['size'];

        //Chnage uploaded file name
        $un = mysqli_real_escape_string($conn,$_POST['firstName']);
        $preFix = substr(strtolower($un),0,2);
        $imgExtention = strtolower(pathinfo($uploadImgName,PATHINFO_EXTENSION));
        if($imgExtention == 'jpg' || $imgExtention == 'JPG' || $imgExtention == 'png' || $imgExtention == 'jpeg' || $imgExtention == 'JPEG'){

            $userImg = $preFix.rand(1000,1000000).".".$imgExtention;
            $targetFile = $targetDir.$userImg;

            if ($uploadImgSize<5000000 AND $uploadImgSize > 0){
                if(!move_uploaded_file($_FILES['pro_pic_img']['tmp_name'],$targetFile)){
                    echo "Image not moved. ";
                    $userImg = "default.jpg";
                }
            }else{
                echo "Not valid image.";
                $userImg = "default.jpg";
            }

        }else{
            echo "Not valid image type.";
            $userImg = "default.jpg";
        }
    }else{
        $userImg = "default.jpg";
    }




    $email = $_SESSION['email'];

    //Get basic data
    $fname = mysqli_real_escape_string($conn,$_POST['firstName']);

    $mname_tmp = mysqli_real_escape_string($conn,$_POST['middlename']);
    $mname = $mname_tmp != "" ? $mname_tmp : "Not set";

    $lname = mysqli_real_escape_string($conn,$_POST['lastname']);

    $username = strtolower($fname).rand(10,1000000);

    $category = mysqli_real_escape_string($conn,$_POST['category']);

    $aca_year_temp = mysqli_real_escape_string($conn,$_POST['academic_year']);
    $aca_year = $aca_year_temp != "" ? $aca_year_temp : 0000;

    $gender = mysqli_real_escape_string($conn,$_POST['gender']);

    $userbirthDay = mysqli_real_escape_string($conn,$_POST['user_birth_day']);

    $current_city = mysqli_real_escape_string($conn,$_POST['current_city']);
    $hometown = mysqli_real_escape_string($conn,$_POST['hometown']);

    $contactInfo = $_POST['contactInfo'];

    $about_me = mysqli_escape_string($conn,$_POST['about_me']);

    $interestSkills = $_POST['interestSkillItem'];

    $qry_to_insert = "INSERT INTO member(username,email,password,first_name,middle_name,last_name,category,academic_year,gender,profile_picture,profile_completed,date_of_birth,current_city,home_town,about,joined_date) VALUES ('$username','$email','$password','$fname','$mname','$lname','$category','$aca_year','$gender','$userImg',1,'$userbirthDay','$current_city','$hometown','$about_me',NOW())";


    //echo base64_encode('remalsha@gmail.com'); //cmVtYWxzaGFAZ21haWwuY29t

    // Add basic member details
    $response = mysqli_query($conn,$qry_to_insert);

    if ($response){

        //Add memeber information
        $mem_id = mysqli_insert_id($conn);
        $qry_to_insert_info = "INSERT INTO member_info(member_id,category,field,f_val) VALUES ";
        $arr = [];
        foreach ($contactInfo as $title => $des){
            $arr[] = "('$mem_id','1','$title','$des')";
        }
        $qry_to_insert_info .= implode(',',$arr);
        $response_from_info = mysqli_query($conn,$qry_to_insert_info);

        //Add member interest and skills
        if ($response_from_info){

            $qry_to_insert_skill = "INSERT INTO skill_interest(member_id,skill) VALUES ";
            $arr2 = [];
            foreach ($interestSkills as $key => $data){
                $arr2[] = "('$mem_id','$data')";
            }
            $qry_to_insert_skill .= implode(',',$arr2);
            $response_from_skill = mysqli_query($conn,$qry_to_insert_skill);

            //Remove request details from server.
            if($response_from_skill){
                $qry_to_remove_request = "DELETE FROM invitation WHERE email='$email'";

                $response_from_remove =  mysqli_query($conn,$qry_to_remove_request);

                if ($response_from_remove){

                    if (session_destroy()){
                        header("location:../../index.php");
                    }

                }else{
                    echo mysqli_error($conn);
                }

            }else{
                echo mysqli_error($conn);
//                echo $qry_to_insert_skill;
            }

        }else{
            echo mysqli_error($conn);
//            echo $qry_to_insert_info;
        }

    }else{
        header("location:index.php");
        echo mysqli_error($conn);
//        echo $qry_to_insert;
    }






}

