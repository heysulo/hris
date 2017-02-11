<?php require_once('path.php');

    defined('hris_access') or die(header("location:../../error.php"));
    $filename = basename($_SERVER['PHP_SELF'],'.php');
$dashbord = null;
$profile = null;
$skill_directory= null;
$groups= null;
$administration= null;
$advancedSearch= null;
    switch ($filename){
        case 'dashboard':
            $dashbord = "active";
            break;
        case 'member':
            $profile = "active";
            break;
        case 'skill_directory';
            $skill_directory = "active";
            break;
        case 'groups';
            $groups = "active";
            break;
        case 'mygroup';
            $groups = "active";
            break;
        case 'administration';
            $administration = "active";
            break;
        case 'advancedSearch';
            $advancedSearch = "active";
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
        <?php if(isset($_SESSION['system_admin_panel_access']) && $_SESSION['system_admin_panel_access']){?>
        <li class="navbaritem <?php echo $administration;?>" id="admin">
            <div>
                <img id="lp_administration" class="navbaritemimg" src="<?php echo $publicPath?>img/img_lp_administration.png">
            </div>
            <div class="navbartxt">
                Administration
            </div>
        </li>
        <?php } ?>
        <li class="navbaritem <?php echo $advancedSearch;?>" id="advancedSearch">
            <div>
                <img id="lp_advancedSearch" class="navbaritemimg" src="<?php echo $publicPath?>/img/img_lp_advancedsearch.png">
            </div>
            <div class="navbartxt">
                Advanced Search
            </div>
        </li>

    </ul>
</div>
