<!DOCTYPE html>
<head>
    <?php
    //print_r($_REQUEST);
    define('hris_access',true);
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
    $user_id = $_SESSION['user_id'];

    $_REQUEST =  array_map('strtolower', $_REQUEST);

    $cs = "select * from member where 1=1 ";
    $gp = "select * from group_member where 1=1 ";
    $meminfo = "select * from skill_interest where 1=0 ";

    //name***********************************
    if (isset($_REQUEST['fname']) && $_REQUEST['fname'] !="" ){
        $cs = $cs."and first_name LIKE '%".addslashes($_REQUEST['fname'])."%'";
    }

    if (isset($_REQUEST['mname']) && $_REQUEST['mname'] !="" ){
        $cs = $cs." and middle_name LIKE '%".addslashes($_REQUEST['mname'])."%'";
    }

    if (isset($_REQUEST['lname']) && $_REQUEST['lname'] !="" ){
        $cs = $cs." and last_name LIKE '%".addslashes($_REQUEST['lname'])."%'";
    }

    //dob*************************************

    if (isset($_REQUEST['dob_y']) && $_REQUEST['dob_y'] !="" ){
        $cs = $cs." and year(date_of_birth) = ".addslashes($_REQUEST['dob_y']);
    }

    if (isset($_REQUEST['dob_m']) && $_REQUEST['dob_m'] !="" ){
        $cs = $cs." and month(date_of_birth) = ".addslashes($_REQUEST['dob_m']);
    }


    if (isset($_REQUEST['dob_d']) && $_REQUEST['dob_d'] !="" ){
        $cs = $cs." and day(date_of_birth) = ".addslashes($_REQUEST['dob_d']);
    }

    if (isset($_REQUEST['gender'])){
        switch ($_REQUEST['gender']){
            case "male":
                $cs = $cs." and gender = \"Male\"";
                break;
            case "female":
                $cs = $cs." and gender = \"Female\"";
                break;
        }
    }

    //location****************************
    if (isset($_REQUEST['hometown']) && $_REQUEST['hometown'] !=-1){
        $cs = $cs." and home_town LIKE '%".addslashes($_REQUEST['hometown'])."%'";
    }

    if (isset($_REQUEST['currentcity']) && $_REQUEST['currentcity'] !=-1){
        $cs = $cs." and current_city LIKE '%".addslashes($_REQUEST['currentcity'])."%'";
    }

    $skill_arr = explode(";",$_REQUEST['skills']);
    foreach ($skill_arr as $value){
        if($value!="")$meminfo = $meminfo." union select * from skill_interest where skill LIKE '%".$value."%'";
    }

    if (isset($_REQUEST['group_selection']) && $_REQUEST['group_selection'] !=-1){
        $gp = $gp." and group_id=".addslashes($_REQUEST['group_selection']);
        if (isset($_REQUEST['role_selection']) && $_REQUEST['role_selection'] !=-1) {
            $gp = $gp . " and role=\"".addslashes($_REQUEST['role_selection'])."\"";
        }
    }

    $final = "select member.member_id from member";

    if($meminfo!="select * from skill_interest where 1=0 "){
        $meminfo = "select distinct tap.member_id from (".$meminfo.") as tap";
        $final= "select distinct ta.member_id from (".$final.") ta inner join (".$meminfo.") tb on ta.member_id = tb.member_id";
    }

    if($gp!="select * from group_member where 1=1 "){
        $gp = "select distinct tbp.member_id from (".$gp.") as tbp";
        $final= "select distinct tc.member_id from (".$final.") tc inner join (".$gp.") td on tc.member_id = td.member_id";
    }

    if($cs!="select * from member where 1=1 "){
        $cs = "select distinct tcp.member_id from (".$cs.") as tcp";
        $final= "select distinct te.member_id from (".$final.") te inner join (".$cs.") tf on te.member_id = tf.member_id";
    }

    ?>
    <title>HRIS | Advanced Search</title>
</head>
<body>
<!--Top pane and Navigation pane added here-->
<div>
    <?php include_once('../templates/navigation_panel.php'); ?>
    <?php include_once('../templates/top_pane.php'); ?>
</div>

<!--Other content goes here-->
<div class="bottomPanel">
    <div style="float:left;height:80px;width:100%;">
        <div style="float:left;width:auto;height:100%;">
            <div class="txt_paneltitle">Advanced Search Results</div>


        </div>

    </div>

    <div class="dashboard_bottom">
        <?php
        $flag =0;
        $conn = null;
        require_once("../user/config.conf");
        require_once ("../database/database.php");
        
        if ($final !="select member.member_id from member"){
            $final = "select member.* from (".$final.") final inner join member on member.member_id = final.member_id";
            //echo $final;
            $res_contact_query = mysqli_query($conn,$final);
            if (mysqli_num_rows($res_contact_query)){
                while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
                    ?>
                    <div class="group_member_hd_box search_member_box" onclick="viewProfile(<?php echo $row_qt["member_id"] ?>)">
                        <img class="group_member_hd_propic" src="../images/pro_pic/<?php echo $row_qt['profile_picture']?>">
                        <div class="group_member_hd_name"><a class="no_link_effects" href="member.php?id=<?php echo $row_qt["member_id"]?>"><?php echo $row_qt["first_name"]." ".$row_qt["middle_name"]." ".$row_qt["last_name"];?></a></div>
                        <div class="group_member_hd_role"><?php echo $row_qt["category"] ?></div>
                        <div class="group_member_hd_role"><?php if($row_qt['course']=="CS"){echo "Computer Science";}else{echo "Information Systems";}?></div>
                    </div>

                    <?php
                }
            }else{
                if ($flag == 1) {
                    ?>
                    <div class="no_search_results_page_box">
                        <div class="error_page_text">We couldnt find anything
                            for <?php echo htmlspecialchars($_GET["search"]) ?></div>
                    </div>
                    <?php
                }
            }
        }








        ?>


        <div style="display: none">
            <?=$final?>
        </div>
    </div>
</div>

<?php
include_once('../templates/_footer.php');
?>
<script>

    function viewProfile(uid) {
        window.location.href =  "member.php?id="+uid;
    }

</script>

</body>
</html>
