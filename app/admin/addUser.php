<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 8/26/16
 * Time: 5:40 PM
 */

require_once("config.conf");
require_once ("../database/database.php");
session_start();

if (isset($_POST['addUser'])){

    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pward = mysqli_real_escape_string($conn,$_POST['password']);

    $password = password_hash($pward,PASSWORD_DEFAULT);

    $query = "INSERT INTO user (firstname, email, password) VALUES ('$fname','$email','$password')";

    $res = mysqli_query($conn,$query);

    if ($res){
        header('location:addUser.php?r=11');
    }else{
        header('location:addUser.php?r=01');
    }

}

?>

<!DOCTYPE>
<html>
<head>
    <?php
    define(hris_access,true);
    require_once('../templates/path.php');?>
    <title>HRIS | ADMINISTRATOR - Add User</title>
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $publicPath?>css/artista.css">

    <style>

        .formbox{
            float: left;
            left: 360px;
            background-color: white;
            border:1px solid grey;
            border-radius: 6px;
            padding: 20px;
            margin:20px;;

        }

        .txt{

            padding: 10px;
            border: 1px solid gray;
            border-radius: 7px;
        }

        .addUserForm{
            display: block;
            margin: 10px;
            padding:15px ;
        }

        .lbl{
            font-family: Catamaran;
            font-size: .9em;
            color: grey;
        }

        .addbtn{
            padding: 10px;
            width:80%;
            border-radius: 8px;
            border: 1px solid darkslategray;
            margin: 20px;
            background-color: #4CA345;
            font-size: 1em;
        }

        .addbtn:hover{
            background-color: #4CAF50;
        }

    </style>

</head>
<body>

<div class="clearfix">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
    <?php //include_once('../templates/bottom_panel.php'); ?>

        <div class="formbox">
            <h3>Add New User</h3>
            <br><br>
            <form action="" method="post" onsubmit="return checkForm()" class="addUserForm">

                <label for="fname" class="lbl">First name :</label><br>
                <input type="text" name="fname" class="txt" required><br>
                <label for="lname" class="lbl">Last name :</label><br>
                <input type="text" name="lname" class="txt" ><br>

                <label for="email" class="lbl">e-mail :</label><br>
                <input type="email" name="email" class="txt" required><br>
                <label for="password" class="lbl">Password :</label><br>
                <input type="password" id="password" name="password" class="txt" required><br>
                <label for="password2" class="lbl">Retype Password :</label><br>
                <input type="password" id="password2" name="password2" class="txt" required><br>


                <input type="submit" name="addUser" class="addbtn" value="Add user">

            </form>

            <!--error massage for wrong user login data-->
            <?php
            if($_GET['r']==11){
                echo "<div class=\"alert-green\"><center>User add successfully.</center></div>";
            }else if ($_GET['r']==01){
                echo "<div class=\"alert\"><center>Unable to add user data.<br> Please try again later.</center></div>";
            }else{

            }
            ?>

        </div>
</div>



<script src="<?php echo $publicPath?>js/jquery-2.2.4.min.js"></script>


<script>
    $(document).ready(function () {
       $('.navbar').hide();
    });


     // javascript function to check form

    function checkForm(){

        //Check password
        var cpw = document.getElementById("password2").value;
        var pw = document.getElementById("password").value;

        if(pw.length<7){
            alert("Please use stronger password. (Hint : use more than 8 charactors.)");
            return false;
        }

        if (pw != cpw) {
            alert('Password not match.');
            return false;
        }

    }

</script>

</body>
</html>


