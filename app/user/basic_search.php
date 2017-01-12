<!DOCTYPE html>
<head>
    <?php
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

    ?>
    <title>HRIS | Basic Search</title>
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
            <div class="txt_paneltitle"><?php
                if(isset($_GET["search"]) and $_GET["search"]!=""){
                    echo "BASIC PEOPLE SEARCH FOR \"".htmlspecialchars($_GET["search"])."\"";
                }else{
                    echo "basic people search";
                }

                ?></div>

        </div>
        <div style="float:right;width:auto;height:100%;">
            <form action="basic_search.php" method="get">

                <input type="text" name="search" placeholder="Search.." class="mainsearch" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
            </form>
        </div>
    </div>

    <div class="dashboard_bottom">
        <?php
        $flag =0;
        $conn = null;
        require_once("../user/config.conf");
        require_once ("../database/database.php");
        if (isset($_GET["search"]) and $_GET["search"]!=""){
        $user_input = htmlspecialchars($_GET["search"]);
            //sample_qry = "SELECT * FROM member WHERE first_name LIKE '$user_input%' OR last_name LIKE '$user_input%' OR middle_name LIKE '$user_input%' OR concat(first_name,' ',last_name) LIKE '%$user_input%';
            //$contact_query = "SELECT * from member where lcase(concat(first_name,\" \",last_name))=lcase(\"$user_input\") or lcase(concat(first_name,\" \",middle_name,\" \",last_name))=lcase(\"$user_input\") or  lcase(concat(first_name,\" \",middle_name))=lcase(\"$user_input\") or  lcase(concat(middle_name,\" \",last_name))=lcase(\"$user_input\") or lcase(first_name)=lcase(\"$user_input\")  or lcase(middle_name)=lcase(\"$user_input\") or lcase(last_name)=lcase(\"$user_input\")";
            $contact_query = "SELECT * FROM member WHERE first_name LIKE '$user_input%' OR last_name LIKE '$user_input%' OR middle_name LIKE '$user_input%' OR concat(first_name,' ',last_name) LIKE '%$user_input%'";
            $res_contact_query = mysqli_query($conn,$contact_query);
        if (mysqli_num_rows($res_contact_query)){
            while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
                ?>
                <div class="group_member_hd_box search_member_box" onclick="viewProfile(<?php echo $row_qt["member_id"] ?>)">
                    <img class="group_member_hd_propic" src="../images/pro_pic/<?php echo $row_qt['profile_picture']?>">
                    <div class="group_member_hd_name"><a class="no_link_effects" href="member.php?id=<?php echo $row_qt["member_id"]?>"><?php echo $row_qt["first_name"]." ".$row_qt["middle_name"]." ".$row_qt["last_name"];?></a></div>
                    <div class="group_member_hd_role"><?php echo $row_qt["category"] ?></div>
                    <div class="group_member_hd_role"><?php echo $row_qt["gender"] ?></div>
                </div>

                <?php
            }
        }else{
            ?>
            <div class="no_search_results_page_box">
                <div class="error_page_text">We couldnt find anything for <?php echo htmlspecialchars($_GET["search"]) ?></div>
            </div>
            <?php
        }
        }?>


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
