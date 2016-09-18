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
    require_once('../templates/path.php');
    include('../templates/_header.php');
    session_start();

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

<div class="clearfix">
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>

    <!--Content goes here-->
    <div class="bottomPanel">

        <div style="float:left;width:auto;">
            <div class="txt_paneltitle">Advanced Search</div>
        </div>
        <div class="profile_section_main">

            <!--Basic details search options.-->
            <div class="dbox advacnedsearch_section_basic">
                <div class="dboxheader dbox_head_advancedsearch_basic">
                    <div class="dboxtitle botmarg">
                        Search People
                    </div>
                    <form>
                        <div class="clearfloat">
                            <input type="checkbox">First name: <input class="advancedsearch_textbox floatright" type="text" name="fname"><br>
                        </div>
                        <div class="clearfloat">
                            <input type="checkbox">Last name: <input class="advancedsearch_textbox floatright" type="text" name="lname"><br>

                        </div>
                        <hr class="advancedsearch_hr">
                        <input type="checkbox">Birthday :
                        <select>
                            <?php
                            for($i = 1900; $i < 2016; ++$i) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <select>
                            <?php
                            for($i = 1; $i < 13; ++$i) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select><br>
                        <input type="checkbox">Gender : <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female<br>
                        <hr class="advancedsearch_hr">
                        <input type="checkbox">From : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        <select>
                            <?php
                            $dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
                            $ary = explode(',', $dist);
                            foreach($ary as $dist){
                                echo "<option value='$dist'>$dist</option>";
                            }
                            ?>
                        </select><br>
                        <input type="checkbox">Lives in :&nbsp;&nbsp;
                        <select>
                            <?php
                            $dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
                            $ary = explode(',', $dist);
                            foreach($ary as $dist){
                                echo "<option value='$dist'>$dist</option>";
                            }
                            ?>
                        </select><br>
                        <hr class="advancedsearch_hr">
                        <div class="clearfloat">
                            <input type="checkbox">Skills/Interests: <br>
                            <div class="advancedsearch_interestpick_area">
                            </div>
                        </div>
                        <hr class="advancedsearch_hr">
                        <div class="clearfloat">
                            <input type="checkbox">Clubs and Societies: <br>
                            <div class="advancedsearch_interestpick_area">
                            </div>
                        </div>
                        <hr class="advancedsearch_hr">
                        <div class="clearfloat">
                            <input type="checkbox">Languages: <br>
                            <div class="advancedsearch_interestpick_area">
                            </div>
                        </div>
                        <hr class="advancedsearch_hr">

                        <div class="clearfloat">
                            <input type="checkbox">Filter: <input class="advancedsearch_textbox floatright" type="text" name="fname"><br>
                        </div>
                        <br>

                        <button class="default_button availability_status_button_2">Search</button>
                    </form>
                </div>
            </div>

            <!--Groups details search here-->
            <div class="dbox advacnedsearch_section_basic">
                <div class="dboxheader dbox_head_advancedsearch_basic">
                    <div class="dboxtitle botmarg">
                        Search Groups and Societies
                    </div>
                    <input class="group_searchbar" type="text" name="fname">
                    <br>
                    <br>
                    <button class="default_button availability_status_button_2">Search</button>
                </div>
            </div>


            <!--Group representative details search in here-->
            <div class="dbox advacnedsearch_section_basic">
                <div class="dboxheader dbox_head_advancedsearch_basic">
                    <div class="dboxtitle botmarg">
                        Search Society Representatives
                    </div>
                    Society :&nbsp;&nbsp;
                    <select class="advancedsearch_socity_representive_dropdown">
                        <?php
                        $dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select><br>

                    <hr class="advancedsearch_hr">
                    Role :&nbsp;&nbsp;
                    <select class="advancedsearch_socity_representive_dropdown">
                        <?php
                        $dist = "Jaffna,Kilinochchi,Mannar,Mullaitivu,Vavuniya,Puttalam,Kurunegala,Gampaha,Colombo,Kalutara,Anuradhapura,Polonnaruwa,Matale,Kandy,Nuwara Eliya,Kegalle,Ratnapura,Trincomalee,Batticaloa,Ampara,Badulla,Monaragala,Hambantota,Matara,Galle";
                        $ary = explode(',', $dist);
                        foreach($ary as $dist){
                            echo "<option value='$dist'>$dist</option>";
                        }
                        ?>
                    </select><br>
                    <br>
                    <button class="default_button availability_status_button_2">Search</button>
                </div>
            </div>

        </div>
    </div>

</div>

<?php
include_once('../templates/_footer.php');
?>
</body>
</html>
