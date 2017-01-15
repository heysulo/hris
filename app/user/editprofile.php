<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    require_once('../templates/path.php');
    include('../templates/_header.php');
    $conn = null;
    require_once("./config.conf");
    require_once("../database/database.php");
    include('../templates/refresher.php');
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

    ?>
    <title>HRIS | Edit Profile</title>
</head>
<body>
<div style="padding: 0px;">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
    <div class=" bottomPanel">
        <?php
        $query = "SELECT * FROM member WHERE member_id = ".$_SESSION['user_id'];
        $result = mysqli_query($conn,$query);
        $row_qt =  mysqli_fetch_assoc($result);
        $view_id = $_SESSION['user_id'];

        ?>
        <form action="<?php echo $appPath;?>user/updateMethods/updateProfile.php" name="editForm" id="form" method="post" enctype="multipart/form-data">
        <div class="profile_section_intro edit_profile_intro_section">
            <div class="profile_profile_image edit_profile_profile_image" id="pro_pic_cover" style="background-image: url('../images/pro_pic/<?php echo $row['profile_picture']?>')">
                <div class="new_propic" id="pro_pic" onclick="document.getElementById('pro_pic_img').click();">
                    Upload Image
                    <input type="file" style="display: none" accept="image/*" name="pro_pic_img" id="pro_pic_img" >
                </div>
            </div>
            <div class="profile_name edit_profile_profile_name">
                <input type="text" id="fname" name="fname" class="edit_profile_name_textbox" placeholder="First Name" value="<?=$row_qt['first_name']?>">
                <input type="text" id="fname" name="mname" class="edit_profile_name_textbox" placeholder="Middle Name" value="<?=$row_qt['middle_name']?>">
                <input type="text" id="fname" name="lname" class="edit_profile_name_textbox" placeholder="Last Name" value="<?=$row_qt['last_name']?>">
            </div>
            <?php

                switch ($row_qt['category']){
                    case "Student":
                        $stu = "selected";
                        break;
                    case "Instructor":
                        $ins = 'selected';
                        break;
                    case "Lecture":
                        $lec = 'selected';
                        break;
                    case "Academic Staff":
                        $aca = 'selected';
                        break;
                }
            ?>


            <div class="profile_basic_summery edit_profile_profile_basic_summery">
                <select required>
                    <option value="Student" <?php echo $stu;?>>Student</option>
                    <option value="Instructor" <?php echo $ins;?>>Instructor</option>
                    <option value="Lecturer" <?php echo $lec;?>>Lecturer</option>
                    <option value="Academic Staff" <?php echo $aca;?>>Academic Staff</option>
                </select><br>

<!--                <input type="text" id="fname" name="firstname" class="edit_profile_name_textbox edit_profile_academic_year" placeholder="Academic Year"><br>-->

                <select>
                    <option value="Male" <?php if($row_qt['gender']=="Male"){echo "selected";}?>>Male</option>
                    <option value="Female" <?php if($row_qt['gender']=="Female"){echo "selected";}?>>Female</option>
                </select><br>
            </div>

        </div>

        <div class="profile_section_main">
            <div class="profile_section_main_left">
                <div class="dbox profile_section_contactinfo">
                    <div class="dboxheader dbox_head_profilecontactinfo">
                        <div class="dboxtitle botmarg">
                            Contact Information
                        </div>

                    </div>
                    <div id="contact_info_item_container">
                        <?php
                            $contact_query = "SELECT field,f_val FROM member_info WHERE category=1 and member_id=$view_id";
                            $res_contact_query = mysqli_query($conn,$contact_query);
                            if (mysqli_num_rows($res_contact_query)){
                                while ($row_cq = mysqli_fetch_assoc($res_contact_query)){
                                    $value =  $row_cq['f_val'];;
                                    $readvalue = $row_cq['f_val'];
                                    ?>
                                    <div class="contact_info_item edit_profile_contactinfo_item">
                                        <div class="edit_profile_contactinfo_item_field"><?=$row_cq['field']?> :</div>
                                        <div class="edit_profile_contactinfo_item_remove" onclick="this.parentElement.outerHTML='';removeEle('<?=$value?>');"></div>
                                        <div class="edit_profile_contactinfo_item_value"><?=$readvalue?></div>
                                    </div>
                                    <input type="hidden" id="<?=$value?>" name="contactInfo['<?=$row_cq['field']?>']" value="<?=$value?>">

                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <hr class="advancedsearch_hr">
                    <div class="dboxheader dbox_head_edit_profile_new_field">
                        <div class="dboxtitle botmarg">
                            Add new fields
                        </div>

                    </div>
                    <select id="conatct_info_opt" class="edit_profile_contactinfo_item_fields">
                        <?php
                        $dist = "Web Site,GitHub,Email,Phone,Intagram,Twitter,YouTube,Pinchester,Tumbler,SoundCloud,LinkedIn,Skype,Blog,Facebook";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>
                    <input id="new_contact_input" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br>
                    <br>
                    <center><button onclick='insertContactInfo();' class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
                </div>

                <script type="text/javascript">
                    function insertContactInfo() {
                        var par = document.getElementById("contact_info_item_container");
                        var val = document.getElementById("new_contact_input").value;
                        var opt = document.getElementById("conatct_info_opt").value;
                        var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\"><div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div><div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'></div><div class=\"edit_profile_contactinfo_item_value\">"+val+"</div></div>";
                        par.innerHTML += code;
                        document.getElementById("new_contact_input").value = "";
                    }
                </script>


                <!---------------------------------------------------------------------------- -->
                <div class="dbox profile_section_socities">
                    <div class="dboxheader dbox_head_profile_socities">
                        <div class="dboxtitle botmarg">
                            Roles in Clubs and Socities
                        </div>
                    </div>
                    <?php
                    $qry_to_get_group_role = "select x.role_name,groups.name,groups.description from (select group_role.role_name,group_member.group_id from group_member JOIN group_role on group_member.role = group_role.role_id and member_id=$view_id) as x join groups on groups.group_id = x.group_id";
                    //echo $contact_query;
                    $res_qry_to_get_group_role= mysqli_query($conn,$qry_to_get_group_role);
                    echo mysqli_error($conn);
                    if (mysqli_num_rows($res_qry_to_get_group_role)){
                        while ($row_gr =  mysqli_fetch_assoc($res_qry_to_get_group_role)){
                            ?>
                            <div class="society_item">
                                <div class="society_item_club"><?php echo $row_gr['name'] ;?></div><div class="society_item_role"><?php echo $row_gr['role_name'] ;?></div>
                                <div class="society_item_extra">
                                    <?php echo $row_gr['description'];?>
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        echo "No Group Info Found";
                    }
                    ?>
                </div>

            </div>
            <div class="profile_section_main_right">
                <div class="dbox profile_section_personal">
                    <div class="dboxheader dbox_head_profile_personal">
                        <div class="dboxtitle botmarg">
                            Shared Information
                        </div>

                    </div>
                    <div id="shared_info_container">
                        <?php
                        $contact_query = "SELECT field,value FROM member_info WHERE category=3 and member_id=$view_id ";
                        $res_contact_query = mysqli_query($conn,$contact_query);
                        if (mysqli_num_rows($res_contact_query)) {
                            while ($row_con = mysqli_fetch_assoc($res_contact_query)) {
                                $value = $row_con['value'];;
                                $readvalue = $row_con['value'];
                                ?>
                                <div class="contact_info_item edit_profile_contactinfo_item">
                                    <div class="edit_profile_contactinfo_item_field"><?= $row_con['field'] ?> :</div>
                                    <div class="edit_profile_contactinfo_item_remove"
                                         onclick='this.parentElement.outerHTML="";'></div>
                                    <div class="edit_profile_contactinfo_item_value"><?= $value ?></div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <hr class="advancedsearch_hr">
                    <div class="dboxheader dbox_head_edit_profile_new_field">
                        <div class="dboxtitle botmarg">
                            Add new fields
                        </div>

                    </div>
                    <select id="shared_info_opt" class="edit_profile_contactinfo_item_fields">
                        <?php
                        $dist = "School,Date of Birth,Stream,Religion,Office Location,A\L Stream,Political Views,Blog";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select>
                    <input id="input_shared_info" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text">
                    <br>
                    <center><button onclick="insertsharedInfo()" class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
                </div>

                <div class="dbox edit_profile_section_aboutme">
                    <div class="dboxheader dbox_head_profile_aboutme">
                        <div class="dboxtitle botmarg">
                            About Me
                        </div>

                        <textarea placeholder="Write something about you." class="edit_profile_about_me" style=""><?php echo $row_qt['about'];?> </textarea>
                    </div>
                </div>

                <div class="dbox profile_section_interests">
                    <div class="dboxheader dbox_head_profile_interetst">
                        <div class="dboxtitle botmarg">
                            Skills & Intrests
                        </div>
                    </div>
                    <hr class="advancedsearch_hr">
                    <div class="dboxheader dbox_head_edit_profile_new_field">
                        <div class="dboxtitle botmarg">
                            Add new Interests/Skill
                        </div>

                    </div>

                    <input id="new_skill_input" name="firstname" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text"><br><br>
                    <center><button onclick="insertSkill();" class="default_button edit_profile_contactinfo_add_button">Add to Profile</button></center>
                    <br><br>
                    <div id="skill_item_container">

                        <?php

                        $qry_to_get_skill = "SELECT skill FROM skill_interest WHERE member_id=$view_id";
                        $res_get_skill = mysqli_query($conn,$qry_to_get_skill);
                        if (mysqli_num_rows($res_get_skill)){
                            while ($row_sk = mysqli_fetch_assoc($res_get_skill)){
                                $skill =  $row_sk['skill'];
                        ?>
                            <div class=skill_item>
                                <div onclick="this.parentElement.outerHTML='';removeEle('<?= $skill;?>');" class="edit_profile_contactinfo_item_remove_skill">
                                </div><?= $skill;?>
                            </div>
                                <input type="hidden" name="contactInfo[]" id="<?=$skill?>" value="<?=$skill?>">
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>


            </div>

        </div>
        <div class="edit_profile_floting_save_button">
            <button class="default_button edit_profile_save_all_button" name="submit" type="submit">Save All Changes</button>
        </div>
        </form>
    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>

<script type="text/javascript">
    function insertSkill() {
        var par = document.getElementById("skill_item_container");
        var val = document.getElementById("new_skill_input").value;
        var code = "<div class=\"skill_item\"><div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\"></div>"+val+"</div>";
        par.innerHTML += code;
    }

    function insertsharedInfo() {
        var par = document.getElementById("shared_info_container");
        var opt = document.getElementById("shared_info_opt").value;
        var val = document.getElementById("input_shared_info").value;
        var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\"><div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div><div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'></div><div class=\"edit_profile_contactinfo_item_value\">"+val+"</div></div>"
        par.innerHTML += code;
    }
</script>


<script>

    $(document).ready(function(){

        //Prevent Default action
        $(document).on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode == 13 && $(e.target)[0]!=$("textarea")[0]) {
                e.preventDefault();
            }
        });

        // Function for Preview profile Image.
        $(function() {
            $("#pro_pic_img").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $('#pro_pic_cover').css('background-image', 'url('+e.target.result+')');
        }

        //Contact info adding through input
        $('#new_contact_input').on('keyup',function(e){
            var keyCode = e.keyCode;
            if (keyCode == 13) {
                e.preventDefault();
                insertContactInfo();
            }
        });

        //Skills add through input
        $('#new_skill_input').on('keyup',function(e){
            var keyCode = e.keyCode;
            if (keyCode == 13) {
                e.preventDefault();
                insertSkill();
            }
        });

    });

    //Functin to remove element
    function removeEle(ele) {
        var elem = document.getElementById(ele);
        elem.remove();
    }


</script>
</body>
</html>