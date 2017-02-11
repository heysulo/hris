<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("config.conf");
    require_once ("../database/database.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['email'])){
        header("location:../../index.php");
    }

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];
    $user_id = $_SESSION['user_id'];


    if(isset($_POST["createGroup"])) {

        //get group name and use it's first two letters to name logo
        $gn = mysqli_real_escape_string($conn, $_POST['g_name']);
        $imgname = substr(strtolower($gn),0,2).rand(100,1000);

        $target_dir = "../images/group/";
        $g_logo_name = basename($_FILES['g_logo']['name']);
        $tmp_logo = $_FILES['g_logo']['tmp_name'];
        $imgExtention = strtolower(pathinfo($g_logo_name,PATHINFO_EXTENSION));
        $newImgName = $imgname.".".$imgExtention;
        $target_file = $target_dir.$newImgName;
        $uploadOk = 1;

        $check = getimagesize($tmp_logo);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $error = "File is not an image. ";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES['g_logo']['size'] > 500000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
        } else {

            $g_name = mysqli_real_escape_string($conn, $_POST['g_name']);
            $g_description = mysqli_real_escape_string($conn, $_POST['g_description']);
            $g_category = mysqli_real_escape_string($conn, $_POST['category']);
            $g_color = mysqli_real_escape_string($conn, $_POST['g_color']);
            $g_privacy = mysqli_real_escape_string($conn, $_POST['privacy_status']);

            $qry = "INSERT INTO groups(name,description,category,logo,created_date,creator,color,privacy) VALUES('$g_name','$g_description','$g_category','$newImgName',NOW(),'$user_id','$g_color','$g_privacy')";
            $moving = move_uploaded_file($tmp_logo,$target_file);
            if ($moving) {
                $res = mysqli_query($conn,$qry);
                if ($res){
                    $note = "Your create group request sent to system administrator. When system administration accept your request your group will active.";
                    $resp = mysqli_query($conn,"SELECT group_id FROM groups WHERE name='$g_name'");
                    $data = mysqli_fetch_assoc($resp);
                    $g_id = $data['group_id'];
                    $qry_to_add_member = "INSERT INTO group_member(`group_id`,`member_id`,`role`,`description`,`join_date`) VALUES ('$g_id','$user_id','Administrator','Created this group in this system.',NOW())";
                    $respo = mysqli_query($conn,$qry_to_add_member);
                    echo mysqli_error($conn);
                }else{
                    $error = mysqli_error($conn);
                }

            }else{
                $error = "Sorry, there was an error uploading your file. $moving";
            }
        }

    }
    ?>
    <title>HRIS | Groups</title>

    <style>

        .form_create_group th {
            float: right;
            margin-right: 10px;
            vertical-align: top;
            padding-top: 8px;
            font-size: .9em;
        }

        .form_create_group input[type=text] {
            width: 300px;
            padding: 8px;
        }

        .form_create_group input {
            font-size: .9em;
        }

        .form_create_group textarea {
            font-size: 1.2em;
        }

        .form_create_group select {
            font-size: .8em;
        }

        .form_create_group .div_input {
            font-size: .8em;
            padding: 5px;
            margin-left: 23px;
        }

    </style>

</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <div class="bottomPanel" style="height: 100%;">
        <div class="cbox" style="padding: 20px; width: 500px; margin-top: 50px;margin-bottom: 10px">
            <form action="" method="post" class="form_create_group" enctype="multipart/form-data">
                <table style="margin: auto;">
                    <tbody>
                        <tr>
                            <th>Group Name </th>
                            <td><input type="text" name="g_name" class="txt_input" required></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><textarea name="g_description" class="txt_input" cols="42" rows="5" required></textarea></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>
                                <select name="category" id="category" style="width: 200px; padding: 3px; margin: 5px; "  required>
                                    <option value="">-- select --</option>
                                    <option value="Social">Social</option>
                                    <option value="Educational">Educational</option>
                                    <option value="Tech Group">Tech Group</option>
                                    <option value="Badge">Badge</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Group Logo</th>
                            <td><input type="file" name="g_logo" accept="image/*" style="padding:5px; border-radius: 5px;" required></td>
                        </tr>
                        <tr>
                            <th>Group Color</th>
                            <td><input type="color" name="g_color" style="margin: 5px; border:1px solid; border-radius: 5px;"></td>
                        </tr>
                        <tr>
                            <th style="row-span: 2">Privacy</th>
                            <td>
                                <label style="font-size: .9em;padding: 3px;">
                                    <input type="radio" name="privacy_status" VALUE="Public" required>
                                    Public
                                </label>
                                <div class="div_input">Anyone can see the group, its members and their posts.</div>

                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <label style="font-size: .9em;padding: 3px; ">
                                    <input type="radio" name="privacy_status" value="Private" required>
                                    Private
                                </label>
                                <div class="div_input">Anyone can find the group and see who's in it.<br> Only members can see posts.</div>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="column-span: 2"> <input type="submit" value="Create Group" name="createGroup" class="msgbox_button group_writer_button" style="float: right; font-weight: 600"></td>
                        </tr>
                    </tbody>
                </table>


            </form>
        </div>

        <div style=" margin-left:30%; padding: 20px; margin-top: 10px;margin-bottom: 10px">

            <!--error massage -->
            <?php
            if(isset($error)){
                echo "<div class=\"alert\" style=\"max-width: 400px;\"> <b>Error !</b><br>$error</div>";
            }

            if(isset($note)){
                echo "<div class=\"alert-green\" style=\"max-width: 400px;\"> <b>Attention !</b><br>$note</div>";
            }
            ?>
        </div>


    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>



</body>
</html>
