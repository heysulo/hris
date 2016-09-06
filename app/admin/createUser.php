<!DOCTYPE html>
<head>
    <?php
    define(hris_access,true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("config.conf");
    require_once ("../database/database.php");
    session_start();

    /*if (!isset($_SESSION['email'])){
        header("location:../../index.php");
    }*/

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];

    if(isset($_POST['createUser'])){

        //get new user details
        $new_user_email = mysqli_real_escape_string($conn,$_POST['email']);
        $new_user_type = $_POST['type'];

        


        //Function to generate random password
        function generatePW($email){
            $pw = password_hash($email,PASSWORD_DEFAULT);
            return $pw;
        }


    }


    ?>
    <title>HRIS | Administrator</title>

    <style>
        th{
            float: right;
            margin-right: 10px;
            vertical-align: top;
            padding-top: 13px;
            font-size: .9em;
        }

        input[type=text]{
            width: 300px;
            padding: 8px;
        }

    </style>
</head>
<body>
<div style="padding: 0px;">
    <?php //include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <div class="bottomPanel" style="height: 100%; width: 100%;">

        <div style="margin-left: 200px">
            <h2>Create New User</h2>
        </div>
        <div class="cbox">
            <div>
                <form action="" method="POST">
                    <table style="margin: auto;">
                        <tr>
                            <th>
                                E-MAIL
                            </th>
                            <td>
                                <input type="email" name="email" class="txt_input" style="font-size: .9em; padding: 7px" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                USER <TYPE></TYPE>
                            </th>
                            <td>
                                <select name="type" id="userType" style="width: 200px; padding: 2px; margin: 5px; font-size: .9em" required>
                                    <option value="">-- select --</option>
                                    <option value="Student">Student</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Instructor">Instructor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="column-span: 2"> <input type="submit" value="Create User" name="createUser" class="green_btn" style="float: right; font-weight: 600; padding: 5px;"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>