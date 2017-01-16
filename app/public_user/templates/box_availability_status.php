<?php defined('hris_access') or die(header("location:../../error.php")); ?>

<div class="dbox availability_status_box">
    <div class="dboxheader dbox_head_availabilitystatus">
        <div class="dboxtitle">
            Availability Status
        </div>

        <!--/Availability drop down implementation-->
        <div style="width:100%;height:50px;" id="availability_dropdown">
            <div class="availability_dropdown" >
                <button class="availability_button" id="setAvailability">
                    <div class="cur_availability_icon" ></div>
                </button>
                <div>
                    <input class="customstatus" id="status_text" placeholder="Select" disabled>
                    <input class="customstatus_text" id="status_text_2" placeholder="Set Message">
                    <button class="default_button availability_status_button" id="set_btn">Set</button>
                </div>

                <!--Default availability values..-->
                <div class="availability_dropdown_content">
                    <div class="availability_dropdown_item" id="Available_#34a853">
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#34a853;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Available
                        </div>
                    </div>

                    <div class="availability_dropdown_item" id="Away_#fbbc05">
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#fbbc05;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Away
                        </div>
                    </div>

                    <div class="availability_dropdown_item" id="Busy_#ea4335">
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#ea4335;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Busy
                        </div>
                    </div>

                    <div class="availability_dropdown_item" id="Lecture_#4285f4">
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#4285f4;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Lecture
                        </div>
                    </div>

                    <div class="availability_dropdown_item" id="Unavailable_#707070">
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#707070;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Unavailable
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <p style="font-size:12px;">
                    Set your availability status so the others who visit your profile can get to know about your availability inside the university.
                </p>
            </center>
        </div>
    </div>
