<!DOCTYPE html>
<head>
    <?php
        require_once('./templates/path.php');
        include('./templates/_header.php');
    ?>
    <title>HRIS | Public User</title>
</head>
<body>
    <!--Top pane and Navigation pane added here-->
    
    <div>
        <?php include_once('./templates/navigation_panel.php'); ?>
        <?php include_once('./templates/top_pane.php'); ?>
    </div>

    <!--Other content goes here-->
    <div class="bottomPanel">
        <!--Title and search box area-->
        <div style="float:left;height:80px;width:100%;">
            <div style="float:left;width:auto;height:100%;">
                <div class="txt_paneltitle">Dashboard</div>
            </div>
        </div>

        <!--content goes here-->

    </div>


    <?php
        include_once('../templates/_footer.php');
    ?>
</body>
</html>
