<?php defined('hris_access') or die(header("location:../../error.php")); ?>


<div class="dboxheader">
    <div class="dboxtitle"> Availability Status </div>

    <div style="width:100%;height:50px;">
        <div class="availability_dropdown">
            <button class="availability_button"> <div class="cur_availability_icon" style="background-color: #0f0;"></div> </button>

            <!--<div style="float:left;width:80%;">
                <input class="customstatus">
                <button>Set</button>
                <button>Save</button>
            </div>-->

            <div class="availability_dropdown_content" style="left:0;">
                <div class="availability_dropdown_item" >
                    <div style="width:20%;float:left;height:auto;">
                        <div class="cur_availability_icon" style="background-color:#0f0;margin:5px;margin-left:14px;"></div>
                    </div>
                    <div style="width:60%;float:left;height:auto;margin:6px;padding-left:10px;">
                        Available
                    </div>
                </div>

                <div class="availability_dropdown_item">
                    <div style="width:20%;float:left;height:auto;">
                        <div class="cur_availability_icon" style="background-color:#f00;margin:5px;margin-left:14px;"></div>
                    </div>
                    <div style="width:60%;float:left;height:auto;margin:6px;padding-left:10px;">
                        Busy
                    </div>
                </div>

                <div class="availability_dropdown_item">
                    <div style="width:20%;float:left;height:auto;">
                        <div class="cur_availability_icon" style="background-color:#ff0;margin:5px;margin-left:14px;"></div>
                    </div>
                    <div style="width:60%;float:left;height:auto;margin:6px;padding-left:10px;">
                        Away
                    </div>
                </div>

                <div class="availability_dropdown_item">
                    <div style="width:20%;float:left;height:auto;">
                        <div class="cur_availability_icon" style="background-color:#555;margin:5px;margin-left:14px;"></div>
                    </div>
                    <div style="width:60%;float:left;height:auto;margin:6px;padding-left:10px;">
                        Unavailable
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div style="width:100%;height:80px;background-color:green;"></div>
</div>