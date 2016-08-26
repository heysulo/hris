<?php require_once('path.php');

    defined('hris_access') or die(header("location:../../error.php"));
    $filename = basename($_SERVER['PHP_SELF'],'.php');

    switch ($filename){
        case 'dashboard':
            $dashbord = "active";
            break;
        case 'profile':
            $profile = "active";
            break;
        case 'skill_directory';
            $skill_directory = "active";
            break;
        case 'groups';
            $groups = "active";
            break;
        case 'administration';
            $administration = "active";
            break;
    }


?>
<div class="panelSide">
    <center>
        <img class="ucsclogo" src="<?php echo $publicPath?>img/ucsc_logo_white.png">
        <p class="hrsititle">Human Resource Information System</p>
    </center>
    <ul class="navbar" id="navbar">
        <li class="navbaritem <?php echo $dashbord;?>" id="dashboard">
            <div>
                <img id="lp_dashboard" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_dashboard.png">
            </div>
            <div class="navbartxt">
                Dashboard
            </div>
        </li>
        <li class="navbaritem <?php echo $profile;?>" id="profile">
            <div>
                <img id="lp_profile" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_profile.png">
            </div>
            <div class="navbartxt">
                My Profile
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
        <li class="navbaritem <?php echo $groups;?>" id="groups">
            <div>
                <img id="lp_groups" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_groups.png">
            </div>
            <div class="navbartxt">
                Groups
            </div>
        </li>
        <li class="navbaritem <?php echo $administration;?>" id="admin">
            <div>
                <img id="lp_administration" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_administration.png">
            </div>
            <div class="navbartxt">
                Administration
            </div>
        </li>
    </ul>
</div>
