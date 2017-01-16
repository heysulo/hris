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
    $imageUploaded = false;

    if(isset($_FILES['pro_pic_img'])){
        $targetDir = "../../images/pro_pic/";
        $uploadImgName = $_FILES['pro_pic_img']['name'];
        $uploadImgSize = $_FILES['pro_pic_img']['size'];

        if(is_uploaded_file($_FILES['pro_pic_img']['tmp_name'])){

            //Chnage uploaded file name
            $un = mysqli_real_escape_string($conn,$_POST['firstName']);
            $preFix = substr(strtolower($un),0,2);
            $imgExtention = strtolower(pathinfo($uploadImgName,PATHINFO_EXTENSION));
            if($imgExtention == 'jpg' || $imgExtention == 'JPG' || $imgExtention == 'png' || $imgExtention == 'jpeg' || $imgExtention == 'JPEG' || $imgExtention == 'jpe'){

                $userImg = $preFix.rand(1000,1000000).".".$imgExtention;
                $targetFile = $targetDir.$userImg;

                if ($uploadImgSize<5000000 AND $uploadImgSize > 0){
                    if(!move_uploaded_file($_FILES['pro_pic_img']['tmp_name'],$targetFile)){
                        echo "Image not moved. ";
                        $userImg = "defimg.jpg";
                    }else{
                        $imageUploaded = true;
                    }
                }else{
                    echo "Not valid image.";
                }

            }else{
                echo "Not valid image type.";
            }

        }else{
            echo "Not valid image.";
        }

    }else{
        $imageUploaded = true;
        $userImg = "defimg.jpg";
    }




    $email = $_SESSION['email'];

    //Get basic data
    $fname = mysqli_real_escape_string($conn,$_POST['firstName']);

    $mname = mysqli_real_escape_string($conn,$_POST['middlename']);

    $lname = mysqli_real_escape_string($conn,$_POST['lastname']);

    $username = strtolower($fname).rand(10,1000000);

    $category = mysqli_real_escape_string($conn,$_POST['category']);

    $aca_year_temp = mysqli_real_escape_string($conn,$_POST['batch']);
    if($aca_year_temp != ""){
        $aca_year = ltrim($aca_year_temp,'B');
        $c = explode('/',$_POST['registration_number']);
        $course =strtoupper($c[1]);
    }else{
        $aca_year = 0000;
        $course = "";
    }

    $gender = mysqli_real_escape_string($conn,$_POST['gender']);

    $userbirthDay = mysqli_real_escape_string($conn,$_POST['user_birth_day']);

    $current_city = mysqli_real_escape_string($conn,$_POST['current_city']);
    $hometown = mysqli_real_escape_string($conn,$_POST['hometown']);

    $contactInfo = $_POST['contactInfo'];

    $about_me = mysqli_escape_string($conn,$_POST['about_me']);

    $interestSkills = $_POST['interestSkillItem'];

    $token = mysqli_escape_string($conn,$_POST['token']);

    //Get user assigned role
    $qry_to_get_role = "SELECT system_role_id FROM invitation WHERE email='$email' AND token='$token'";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$qry_to_get_role));
    $role = $res['system_role_id'];

    $qry_to_insert = "INSERT INTO member(username,email,password,first_name,middle_name,last_name,category,academic_year,gender,profile_picture,profile_completed,date_of_birth,current_city,home_town,about,system_role,course,joined_date) VALUES ('$username','$email','$password','$fname','$mname','$lname','$category','$aca_year','$gender','$userImg',1,'$userbirthDay','$current_city','$hometown','$about_me','$role','$course',NOW())";


    //echo base64_encode('remalsha@gmail.com'); //cmVtYWxzaGFAZ21haWwuY29t

    if($imageUploaded){

        // Add basic member details
        $response = mysqli_query($conn,$qry_to_insert);

        if ($response){

            if(!empty(array_filter($contactInfo))) {

                //Add memeber information
                $mem_id = mysqli_insert_id($conn);
                $qry_to_insert_info = "INSERT INTO member_info(member_id,category,field,f_val) VALUES ";
                $arr = [];
                foreach ($contactInfo as $title => $des) {
                    $title = mysqli_escape_string($conn, $title);
                    $des = mysqli_escape_string($conn, $des);
                    $arr[] = "('$mem_id','1','$title','$des')";
                }
                $qry_to_insert_info .= implode(',', $arr);
                $response_from_info = mysqli_query($conn, $qry_to_insert_info);

                if(!$response_from_info){
                    echo mysqli_error($conn);
                }

            }

            //Add member interest and skills
            if (!empty(array_filter($interestSkills))){

                $qry_to_insert_skill = "INSERT INTO skill_interest(member_id,skill) VALUES ";
                $arr2 = [];
                foreach ($interestSkills as $key => $data){
                    $data = mysqli_escape_string($conn,$data);
                    $arr2[] = "('$mem_id','$data')";
                }
                $qry_to_insert_skill .= implode(',',$arr2);
                $response_from_skill = mysqli_query($conn,$qry_to_insert_skill);

                if(!$response_from_skill){
                    echo mysqli_error($conn);
                }
            }

            //Remove request details from server.
            $qry_to_remove_request = "DELETE FROM invitation WHERE email='$email'";
            $response_from_remove =  mysqli_query($conn,$qry_to_remove_request);

            if ($response_from_remove){
                if (session_destroy()){
                    header("location:success.php");
                }
            }else{
                echo mysqli_error($conn);
            }

        }else{
            //header("location:index.php");
            echo mysqli_error($conn);
        echo $qry_to_insert;
        }

    }else{
        echo "Profile picture upload error.";
    }

}

