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
                <?php

                /*Function to generate random colors*/
                function random_color_part() {
                    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
                }
                function random_color() {
                    return random_color_part() . random_color_part() . random_color_part();
                }

                /*few material colors*/
                $colorHex = array('1abc9c','2ecc71','3498db','9b59b6','34495e','16a085','27ae60','2980b9','8e44ad','2c3e50','f1c40f','e67e22','e74c3c','f39c12','d35400','c0392b');

                /*for ($x = 0; $x <= 40; $x++) {
                    //$color = random_color();
                    //$color = $colorHex[array_rand($colorHex)];

                    if ($x % 2 == 1){
                        $color = "2ecc71";
                    }else{
                        $color = "34495e";
                    }
                    include('../templates/news_feed_items.php');
                }*/



                ?>

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
