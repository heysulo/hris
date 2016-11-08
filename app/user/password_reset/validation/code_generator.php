
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    //echo date("Ymd");
    //echo(mt_rand(10000000,99999999));
    $conn = null;

    date_default_timezone_set('Asia/Colombo');
    require_once("../../config.conf");
    require_once ("../../../database/database.php");
    $_SESSION["badtry"]=0;
    if (isset($_SESSION["email"])){
        $email = $_SESSION["email"];
        //echo $email;
        $query = "SELECT * FROM member WHERE email='$email'";
        $res = mysqli_query($conn,$query);
        if (mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);


            //echo "<br>".((strtotime(date('Y-m-d H:i:s'))-strtotime($row['code_gen_date']))/7200)."<br>";
            if ((strtotime(date('Y-m-d H:i:s'))-strtotime($row['password_reset_block']))/3600 > 24){
                if (isset($_SESSION["block"])){
                    unset($_SESSION["block"]);
                }
                $_SESSION["code_active"]=1;;
                //generate new code if the code is older than 2 hours
                if ((strtotime(date('Y-m-d H:i:s'))-strtotime($row['code_gen_date']))/3600 > 2){
                    $nowtd = (date('Y-m-d H:i:s'));
                    $new_code = mt_rand(10000000,99999999);
                    echo "new code $new_code applied";
                    $codegenquery ="UPDATE member SET code_gen_date='$nowtd', password_reset_attempts=3,  reset_code_enabled=1, password_reset_code=$new_code WHERE email=\"$email\";";
                    $res = mysqli_query($conn,$codegenquery);
                    if ($res){
                        echo "done";
                    }else{
                        echo mysqli_error($conn);
                    }
                }else{
                    echo "code active";
                    if ($row['reset_code_enabled'] != 1){
                        //gen new code
                        $nowtd = (date('Y-m-d H:i:s'));
                        $new_code = mt_rand(10000000,99999999);
                        echo "new code $new_code applied";
                        $codegenquery ="UPDATE member SET code_gen_date='$nowtd', password_reset_attempts=3,  reset_code_enabled=1, password_reset_code=$new_code WHERE email=\"$email\";";
                        $res = mysqli_query($conn,$codegenquery);
                        if ($res){
                            echo "done";
                        }else{
                            echo mysqli_error($conn);
                        }
                        echo "code enabled";
                    }
                }

                header('Location: '."../verification_code.php");
            }else{

                $_SESSION["block"]="yes";
                $_SESSION["code_active"]=0;
                header('Location: '."../account_blocked.php");
            }

//
//
//            $_SESSION['fname'] = $row['first_name'];
//            $_SESSION['lname'] = $row['last_name'];
//            $_SESSION['mname'] = $row['middle_name'];
//            $_SESSION["pass"] = 1;
        }else{
            header('Location: '."../password_reset.php");
        }
        //echo $_SESSION["pass"];
    }else{
        header('Location: '."../password_reset.php");
    }
?>