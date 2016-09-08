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
                                <p>Fusce accumsan in est non sodales. Donec faucibus urna sed ex pulvinar, sed vulputate odio porttitor. Ut accumsan eu nunc in aliquet. Quisque at nisi et mauris pharetra rhoncus sit amet vitae leo. Nulla nec bibendum turpis, in mollis felis.</p>
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


                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:cornflowerblue ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        The induction day for the August pocket recruitment of AIESSC Colombo
                        Central will be held at the Mathematics Auditorium on 27th August 2016.
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>

                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:cornflowerblue ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        Introducing the Talent Management Team of AIESEC Colombo Central for
                        the term 16/17.
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>

                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:cornflowerblue ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        As the first event in a series of impactful campaigns organized by
                        the Bleed Green project, "BeachCleanup" will be held on 6th August at the
                        Dehiwala beach.
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>

                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:saddlebrown ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        Dear Gaveliers!!!
                        Another chance to prove yourselves, if you are interested ....
                        INVYAM Inter - University Debating Championship - 2016.
                        The contest would be held at Faculty of
                        Arts - University of Colombo, on 22nd of July, 2016.
                        The Registration: Before 8th of July with a debating team,
                        consisting of 05 members
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>

                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:cornflowerblue ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        The induction day for the August pocket recruitment of AIESSC Colombo
                        Central will be held at the Mathematics Auditorium on 27th August 2016.
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>

                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:saddlebrown ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        Best Speaker 2016 (An All Island Inter-University Best
                        Speaker Competition) Organized by the Gavel Club of University
                        of Kelaniya is just round the corner! Here's a glimpse of our
                        very own Gavilier Dushanthi Weerasekera 's speech at the Grand
                        Finale of Best Speaker - 2015!!
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>

                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:saddlebrown ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        Hey guys, we have designed a new gavel t-shirt for upcoming
                        induction ceremony. Cotton material. Sold for 800/=. Please
                        click the link below and place your order.
                        http://goo.gl/forms/NdYkvrAzBq!
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>
                <div class="newsfeed_item_box" style = "border-color:#<?= $color;?>;">
                    <div class="newsfeed_item_colorbar" style="background-color:saddlebrown ; border-radius: 2px"></div>
                    <div class="newsfeed_item_content">
                        Today is International Youth Day! Let us realize the value of our Youth Vote.
                        Are you not a registered Voter yet? Hear from the Election Commissioner
                        himself on how to get registered. Register yourself today
                    </div>
                    <div class="newsfeed_item_timestamp">Wednesday, August 24, 2016 at 2:14am</div>
                </div>


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
