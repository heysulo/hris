<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 8/31/16
 * Time: 7:39 AM
 */?>
<!DOCTYPE html>
<head>
    <?php
    define('hris_access',true);
    $conn = null;
    require_once("./config.conf");
    require_once("../database/database.php");
    require_once('../templates/path.php');
    include('../templates/_header.php');
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
    <title>HRIS | Groups</title>
</head>
<body>

<?php include_once('../templates/navigation_panel.php'); ?>
<?php include_once('../templates/top_pane.php'); ?>
<div class="bottomPanel">
    <form method="get" action="searchresults.php">
    <div style="width:auto;">
        <div class="txt_paneltitle">Advanced Search</div>
    </div>
    <div class="adv_search_mainbox">
        <div style="width: 50%;height: 40px;float: left;background-color: transparent">

            <div class="dbox">
                <div class="adv_search_subtitle">Name</div>
                <input type="text" id="pw" name="fname" class="adv_search_txtbox" placeholder="First Name" pattern="[a-zA-Z]+" style="width: 92%;">
                <input type="text" id="pw" name="mname" class="adv_search_txtbox" placeholder="Middle Name" pattern="[a-zA-Z]+" style="width: 92%;">
                <input type="text" id="pw" name="lname" class="adv_search_txtbox" placeholder="Last Name" pattern="[a-zA-Z]+" style="width: 92%;">
            </div>

            <div class="dbox">
                <div class="adv_search_subtitle">Birthday</div>
                <input type="text" id="pw" name="dob_y" class="adv_search_txtbox" placeholder="Year" pattern="[1|2]{1}[0-9]{1}[0-9]{1}[0-9]{1}" style="width: 25%;">
                <input type="text" id="pw" name="dob_m" class="adv_search_txtbox" placeholder="Month" pattern="[1-12]+" style="width: 25%;">
                <input type="text" id="pw" name="dob_d" class="adv_search_txtbox" placeholder="Day" pattern="[1-31]+" style="width: 25%;">
                <div class="adv_search_subtitle">Gender</div>
                <span>
                <input type="radio" name="gender" value="male" checked> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="any" checked> Ignore Gender
                </span>

            </div>

            <div class="dbox" style="background-color: #fff; overflow:hidden; ">
                <div style="width: 50%;float: left;">
                    <div class="adv_search_subtitle">Hometown</div>
                    <select name="hometown" class="adv_search_dropdown">
                        <option value="-1" selected>Unset</option>
                        <?php
                        $query32 = "SELECT * FROM district ORDER BY name asc;";
                        $result = mysqli_query($conn,$query32);
                        if (mysqli_num_rows($result)){
                            while ($row_qt =  mysqli_fetch_assoc($result)){
                                echo "<option value='".$row_qt['name']."'>".$row_qt['name']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="width: 50%;float: left">
                    <div class="adv_search_subtitle">Current City</div>
                    <select name="currentcity" class="adv_search_dropdown">
                        <option value="-1" selected>Unset</option>
                        <?php
                        $query32 = "SELECT * FROM district ORDER BY name asc;";
                        $result = mysqli_query($conn,$query32);
                        if (mysqli_num_rows($result)){
                            while ($row_qt =  mysqli_fetch_assoc($result)){
                                echo "<option value='".$row_qt['name']."'>".$row_qt['name']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="dbox">
                <div class="adv_search_subtitle">Skills and Interests</div>
                <div id="skill_item_container">
                    <!--<div class="skill_item">
                        <!--<div class="edit_profile_contactinfo_item_remove_skill" onclick='this.parentElement.outerHTML=""'></div>-->
                    <!--// item added here...
                </div>-->
                </div>

                <input id="new_skill_input" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text">
                <input type="button" onclick="insertSkill();" class="add_new_item_btn" value="Add Skill">
                <div style="clear: both;"></div>
            </div>
            <input type="submit" class="adv_srch_float_btn" value="Advanced Search">
            <div style="clear: both;"></div>
        </div>


        <div style="width: 50%;height: 40px;float: left;background-color: transparent">
            <div class="dbox">
                <div class="adv_search_subtitle">Clubs & Organization Engagements</div>
                <div class="adv_search_subtitle_2">Club/Society Name :</div>
                <select class="adv_search_dropdown" style="width: 100%;">
                    <option value="Unset" selected>Unset</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Vavuniya">Vavuniya</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Matale">Matale</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Matara">Matara</option>
                    <option value="Galle">Galle</option>
                </select>
                <br>
                <br>
                <div class="adv_search_subtitle_2">Role :</div>
                <select class="adv_search_dropdown" style="width: 100%;">
                    <option value="Unset" selected>Unset</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Vavuniya">Vavuniya</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Matale">Matale</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Matara">Matara</option>
                    <option value="Galle">Galle</option>
                </select>
            </div>

            <div class="dbox">
                <div class="adv_search_subtitle">Skills and Interests</div>
                <div id="skill_item_container">
                    <!--<div class="skill_item">
                        <!--<div class="edit_profile_contactinfo_item_remove_skill" onclick='this.parentElement.outerHTML=""'></div>-->
                    <!--// item added here...
                </div>-->
                </div>

                <input id="new_skill_input" class="edit_profile_contactinfo_item_value_field" placeholder="Enter Field Value type" Here="text">
                <input type="button" onclick="insertSkill();" class="add_new_item_btn" value="Add Skill">
                <div style="clear: both;"></div>
            </div>

<!--            <input type="button" value="Add More Engagements" class="adv_srch_addmore_btn">-->
            <input name="skills" type="hidden" value="" id="skill_list" >
        </div>
        <div style="clear: both;;background-color: transparent"></div>
    </div>

    </form>
</div>

<?php
include_once('../templates/_footer.php');
?>

<script>


    function insertSkill() {
        var par = document.getElementById("skill_item_container");
        var val = document.getElementById("new_skill_input").value;
        if (val !="") {
            var code = "<div class=\"skill_item\">" +
                "<div onclick='this.parentElement.outerHTML=\"\";' class=\"edit_profile_contactinfo_item_remove_skill\">" +
                "</div>" + val + "<input type='hidden' class='blank_skill' value='" + val + "'></div>";
            par.innerHTML += code;
            document.getElementById("new_skill_input").value = "";
        }
        var s = document.getElementById("skill_list");
        var x = document.getElementsByClassName("blank_skill");
        var i;
        s.value = "";
        for (i = 0; i < x.length; i++) {
            s.value += x[i].value + ";";
        }
        //
    }
</script>
</body>
</html>
