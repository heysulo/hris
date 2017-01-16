<?php require_once('path.php');

$filename = basename($_SERVER['PHP_SELF'],'.php');
$dashbord = null;
$profile = null;
$skill_directory= null;
$groups= null;
$administration= null;
$advancedSearch= null;
    switch ($filename){
        case 'public':
            $profile = "active";
            break;
        case 'skill_directory';
            $skill_directory = "active";
            break;
    }


?>
<div class="panelSide">
    <center>
        <img class="ucsclogo" src="<?php echo $publicPath?>img/ucsc_logo_white.png">
        <p class="hrsititle">Human Resource Information System</p>
    </center>
    <ul class="navbar" id="navbar">

        <li class="navbaritem <?php echo $profile;?>" id="profile">
            <div>
                <img id="lp_profile" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_profile.png">
            </div>
            <div class="navbartxt">
                Search People
            </div>
        </li>
        <li class="navbaritem <?php echo $skill_directory;?>" id="skill_directory">
            <div>
                <img id="lp_skilldirectory" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_skilldirectory.png">
            </div>
            <div class="navbartxt">
                Skill Directory
            </div>
        </li>
        <li class="navbaritem <?php echo $advancedSearch;?>" id="advancedSearch">
            <div>
                <img id="lp_advancedSearch" class="navbaritemimg" src="<?php echo $publicPath?>/img/img_lp_advancedsearch.png">
            </div>
            <div class="navbartxt">
                About
            </div>
        </li>

    </ul>
</div>
