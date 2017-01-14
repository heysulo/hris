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
        <div class="profile_section_intro edit_profile_intro_section">
            <div class="profile_profile_image edit_profile_profile_image"><div class="new_propic">Upload Image</div></div>
            <div class="profile_name edit_profile_profile_name">
                <input type="text" id="fname" name="fname" class="edit_profile_name_textbox" placeholder="First Name" value="<?=$row_qt['first_name']?>">
                <input type="text" id="fname" name="mname" class="edit_profile_name_textbox" placeholder="Middle Name" value="<?=$row_qt['middle_name']?>">
                <input type="text" id="fname" name="lname" class="edit_profile_name_textbox" placeholder="Last Name" value="<?=$row_qt['last_name']?>">
            </div>
            <div class="profile_basic_summery edit_profile_profile_basic_summery">
                <select>
                    <option value="volvo">Student</option>
                    <option value="saab">Instructor</option>
                    <option value="opel">Lecturer</option>
                    <option value="audi">Academic Staff</option>
                </select><br>
                <input type="text" id="fname" name="firstname" class="edit_profile_name_textbox edit_profile_academic_year" placeholder="Academic Year"><br>
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
                            $contact_query = "SELECT field,value FROM member_info WHERE category=1 and member_id=$view_id";
                            $res_contact_query = mysqli_query($conn,$contact_query);
                            if (mysqli_num_rows($res_contact_query)){
                                while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
                                    $value =  $row_qt['value'];;
                                    $readvalue = $row_qt['value'];
                                    ?>
                                    <div class="contact_info_item edit_profile_contactinfo_item">
                                        <div class="edit_profile_contactinfo_item_field"><?=$row_qt['field']?> :</div>
                                        <div class="edit_profile_contactinfo_item_remove" onclick='this.parentElement.outerHTML="";'></div>
                                        <div class="edit_profile_contactinfo_item_value"><?=$readvalue?></div>
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
                    <select id="conatct_info_opt" class="edit_profile_contactinfo_item_fields">
                        <?php
                        $dist = "GitHub,Email,Phone,Intagram,Twitter,YouTube,Pinchester,Tumbler,SoundCloud,LinkedIn,Skype,Blog,Facebook";
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
                    $contact_query = "select x.role_name,groups.name,groups.description from (select group_role.role_name,group_member.group_id from group_member JOIN group_role on group_member.role = group_role.role_id and member_id=$view_id) as x join groups on groups.group_id = x.group_id";
                    //echo $contact_query;
                    $res_contact_query = mysqli_query($conn,$contact_query);
                    echo mysqli_error($conn);
                    if (mysqli_num_rows($res_contact_query)){
                        while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
                            ?>
                            <div class="society_item">
                                <div class="society_item_club"><?php echo $row_qt['name'] ;?></div><div class="society_item_role"><?php echo $row_qt['role_name'] ;?></div>
                                <div class="society_item_extra">
                                    <?php echo $row_qt['description'];?>
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
                            while ($row_qt = mysqli_fetch_assoc($res_contact_query)) {
                                $value = $row_qt['value'];;
                                $readvalue = $row_qt['value'];
                                ?>
                                <div class="contact_info_item edit_profile_contactinfo_item">
                                    <div class="edit_profile_contactinfo_item_field"><?= $row_qt['field'] ?> :</div>
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

                <script type="text/javascript">
                    function insertsharedInfo() {
                        var par = document.getElementById("shared_info_container");
                        var opt = document.getElementById("shared_info_opt").value;
                        var val = document.getElementById("input_shared_info").value;
                        var code = "<div class=\"contact_info_item edit_profile_contactinfo_item\"><div class=\"edit_profile_contactinfo_item_field\">"+opt+"</div><div class=\"edit_profile_contactinfo_item_remove\" onclick=\'this.parentElement.outerHTML=\"\";\'></div><div class=\"edit_profile_contactinfo_item_value\">"+val+"</div></div>"
                        par.innerHTML += code;
                    }
                </script>





                <div class="dbox edit_profile_section_aboutme">
                    <div class="dboxheader dbox_head_profile_aboutme">
                        <div class="dboxtitle botmarg">
                            About Me
                        </div>
                        <textarea placeholder="Write something about you." class="edit_profile_about_me"></textarea>
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
                        $str =  "Your lists will also appear in the Interests section of your bookmarks. Simply click the list's name to see all the recent posts and activity from the Pages and people featured in the list.";
                        $ary = explode(' ', $str);
                        foreach($ary as $str){
                            ?>

                        <div class="edit_profile_contactinfo_item_remove_skill" onclick='this.parentElement.outerHTML=""'></div>
                            <?= $str;?>
                        </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <script type="text/javascript">
                    function insertSkill() {
                        var par = document.getElementById("skill_item_container");
                        var val = document.getElementById("new_skill_input").value;
                        var code = "<div class=\"skill_item\"><div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\"></div>"+val+"</div>";
                        par.innerHTML += code;
                    }
                </script>
            </div>

        </div>
        <div class="edit_profile_floting_save_button">
            <button class="default_button edit_profile_save_all_button">Save All Changes</button>
        </div>
    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>