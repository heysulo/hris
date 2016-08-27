<?php defined('hris_access') or die(header("location:../../error.php")); ?>

<div class="dbox availability_status_box">
    <div class="dboxheader dbox_head_availabilitystatus">
        <div class="dboxtitle">
            Availability Status
        </div>
        <div style="width:100%;height:50px;">
            <div class="availability_dropdown">
                <button class="availability_button">
                    <div class="cur_availability_icon" ></div>
                </button>
                <div>
                    <input class="customstatus">
                    <button class="default_button availability_status_button">Set</button>
                    <!-- <button class="default_button availability_status_button">Save</button> -->
                </div>

                <div class="availability_dropdown_content">
                    <div class="availability_dropdown_item" >
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#34a853;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Available
                        </div>
                    </div>

                    <div class="availability_dropdown_item" >
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#fbbc05;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Away
                        </div>
                    </div>

                    <div class="availability_dropdown_item" >
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#ea4335;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Busy
                        </div>
                    </div>

                    <div class="availability_dropdown_item" >
                        <div style="width:20%;float:left;height:auto;">
                            <div class="saved_availability_icon" style="background-color:#4285f4;"></div>
                        </div>
                        <div class="availability_dropdown_item_text_template">
                            Lecture
                        </div>
                    </div>

                    <div class="availability_dropdown_item" >
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
            <!-- <div >
                <select name="cars"  size="5" class="saved_status_messages">
                      <option style="color:#34a853;" value="volvo">Available till 2.00 PM</option>
                      <option style="color:#ea4335;" value="saab">Exam Duty</option>
                      <option style="color:#ea4335;" value="opel">Board Meeting</option>
                      <option style="color:#fbbc05;" value="volvo">Out for Lunch</option>
                      <option style="color:#4285f4;" value="saab">Lecture at W002</option>
                  <option value="audi">Audi</option>
                </select>
            </div> -->
        </div>
    </div>