<?php defined('hris_access') or die(header("location:../../error.php")); ?>

<div class="dashboard_bottom">
    <div class="dashboard_leftbox">

        <!--availability status box-->
        <div >
            <?php include_once('box_availability_status.php'); ?>
        </div>

        <!--Notification area-->
        <div class="dbox notification_box">
            <div class="dboxheader">
                <div class="dboxtitle">
                    Requests
                </div>
                <div class="notification_content">
                    <div class="request-tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#all_request">All Request</a></li>
                            <li><a href="#meeting">Meeting</a></li>
                            <li><a href="#information">Information</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="all_request" class="tab active">
                                <p>All Requests listed in here.</p>
                                <p></p>
                            </div>
                            <!----------------------------------->
                            <div id="meeting" class="tab">
                                <p>All meeting schedules shows here.</p>
                            </div>
                            <!----------------------------------->
                            <div id="information" class="tab">
                                <p>Some information shows here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!--News feed and activity feed -->
<div class="dashboard_rightbox">
    <div class="dashboard_newsfeed dbox">
        <div class="dboxheader dbox_head_newsfeed">
            <div class="dboxtitle">
                News Feed / Activity Feed
            </div>
            <div class="newsfeed_content">
                <!--implementaions -->
                <div class="newsfeed_item_box" style = "border-color:orangered;">
                    <div class="newsfeed_item_colorbar" style="background-color:orangered; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        This is a sapmle data.. IF you see this, that means you unable to get data from database.Please check your connection of complains to remalsha@gmail.com.
                    </div>
                    <div class="newsfeed_item_timestamp">Friday, September 2, 2016 at 9:32pm</div>
                </div>

            </div>
        </div>
    </div>
</div>
