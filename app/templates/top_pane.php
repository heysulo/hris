<?php
    include_once ("path.php");
    defined('hris_access') or die(header("location:../../error.php"));
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];
    
?>
<span id="ajaxloadinganimation" style="display: none;">
    <div class="msgbox_section_title">
        <div class="msgbox_title">Loading Content</div>
    </div>
    <div >
        <img src="<?php echo $publicPath?>img/loading.gif">
    </div>

</span>
<span id="popupscreen" style="display: none">
	<div class="popup_background">
		<span id="popup_content_area">

		</span>
	</div>
	<div class="popup_dimmer" id="popup_dimmer"></div>
</span>
<div class="panelTop">
        <div class="divadjustment">
            <div class="top_dropdown_click">
                <div class="topbox_account_settings" id="setting"></div>
                <div class="top_dropdown_content_click" id="dropdown">
                        <a href="#">Account Settings</a>
                        <a href="logout.php">Logout</a>
                        <a href="#">Go Offline</a>

                </div>
            </div>

            <!--User detail showing bar-->
            <div class="topsearchbar">
                <form action="basic_search.php" method="get">

                    <input type="text" name="search" placeholder="Search.." class="topheadersearch" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
                </form>
            </div>


            <div class="top_notification_icon"><div id="notification_count" class="top_notification_icon_inner">0</div></div>
            <script>
                var blinker_active = false;
                function setncount(count) {
                    var nd = document.getElementById("notification_count");
                    console.log(count);
                    if (count<=0){
                        nd.innerHTML = "0";
                        nd.style.display = "none";
                        blinker_active = false;
                        clearInterval(title_blinker);
                        document.title = original_title;
                    }else{
                        if(blinker_active == false){
                            blinktitle();
                            blinker_active = true;
                        }
                        nd.innerHTML = count;
                        nd.style.display = "block";
                    }

                }


                function inc_nc() {
                    setncount(parseInt(document.getElementById("notification_count").innerHTML)+1);
                }

                function dec_nc() {
                    setncount(parseInt(document.getElementById("notification_count").innerHTML)-1);
                }
            </script>

            <div class="topprofilecontent" id="top_profile_content_bar" >
                <div>

                    <div class=""><img class="topprofilepicture" src=" <?php echo "$imagePath/pro_pic/$pro_pic"; ?> " alt=""></div>
                    <div class="topbox_profile_name"> <?php echo "$fname $lname"?></div>
                    <div class="topbox_profile_role"><?php echo "$type"?></div>
                </div>
                
            </div>


        </div>
</div>
<div id="msgbox_responder"></div>

<div id="dummynf" style="display: none">
    <li class="notification_item" id="nid_%nid%" >
        <div class="notification_bg">
            <div class="notify_icon <--icon-->"></div>
            <div class="notify_close_button" onclick='clearnotification("nid_%nid%")'></div>
            <div class="notify_content">
                %content%
            </div>
        </div>
    </li>
</div>

<ul class="notification_area" id="notification_list" onchange="document.title = document.getElementById('notification_list').children.tags('li').length">
<!--    <li class="notification_item">-->
<!--        <div class="notification_bg">-->
<!--            <div class="notify_icon notify_icon_default"></div>-->
<!--            <div class="notify_close_button"></div>-->
<!--            <div class="notify_content">-->
<!--                <b>Sulochana Kodituwakku</b> requested a meeting with you on this friday.-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->

</ul>

<script>
    var title_flag = true;
    var title_blinker = 0;
    var original_title = "HRIS";
    function blinktitle() {
        original_title = document.title;
        title_blinker = setInterval(function(){
            if (title_flag){
                document.title = parseInt(document.getElementById("notification_count").innerHTML) + " New Notifications.";
                title_flag = !title_flag;
            }else{
                document.title = original_title;
                title_flag = !title_flag;
            }
        }, 1000);
    }

    function notify(conetent,xicon,link) {
        if (xicon==undefined){
            xicon = "notify_icon_default";
        }
        var nid = "CNID"+Math.floor((Math.random() * 9000) + 1000);
        var nfc = document.getElementById("notification_list");
        var tmp = document.getElementById("dummynf").innerHTML;
        tmp = tmp.replace("%content%",conetent);
        tmp = tmp.replace("<--icon-->",xicon);
        tmp = tmp.replace("%nid%",nid);
        tmp = tmp.replace("%nid%",nid);
        nfc.innerHTML+= tmp;
        document.getElementById("audio_notify").play();
        inc_nc();



    }

    function notificationpoll() {
        var nfc = document.getElementById("notification_list");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != "timeout"){
                    nfc.innerHTML+= this.responseText;
                    document.getElementById("audio_notify").play();
                    inc_nc();
                }
            }
            if (this.readyState ==4){
                notificationpoll();
            }
        };
        xhttp.open("GET", "<?php echo $server_folder?>notificationpoll.php", true);
        xhttp.send();
    }
    //window.onload = function () { notificationpoll(); }

    notificationpoll(); //init call




    function acceptmeeting(nid,or_nid) {
        clearnotification(or_nid);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState ==4 && xhr.status == 200){
                switch(this.responseText){
                    case "success":
                        msgbox("Meeting request accepted.","Request Accepted",1);
                        break;

                    default:
                        msgbox("Error occured while attempting to accept the meeting request. Please try again shortly","Error Occured",3);
                        break;
                }
            }
        };
        xhr.open("POST", "<?php echo $server_folder?>acceptmeeting.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("nid="+nid);
    }

    function rejectmeeting(nid,or_nid) {
        clearnotification(or_nid);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState ==4 && xhr.status == 200){
                switch(this.responseText){
                    case "success":
                        msgbox("Meeting request rejected.","Request rejected",1);
                        break;

                    default:
                        msgbox("Error occured while attempting to reject the meeting request. Please try again shortly","Error Occured",3);
                        break;
                }
            }
        };
        xhr.open("POST", "<?php echo $server_folder?>rejectmeeting.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("nid="+nid);
    }

    function reshedulemeeting(nid,or_nid) {
        //clearnotification(or_nid);
        var xhr = new XMLHttpRequest();
        var popupscreen = document.getElementById("popupscreen");
        var dimmer = document.getElementById("popup_dimmer");
        var popupcontentareax = document.getElementById("popup_content_area");
        var animation = document.getElementById("ajaxloadinganimation");
        popupcontentareax.innerHTML = animation.innerHTML;
        popupscreen.style.display="block";
        xhr.onreadystatechange = function () {
            if (xhr.readyState ==4 && xhr.status == 200){
                var popupcontentarea = document.getElementById("popup_content_area");
                popupcontentarea.innerHTML = xhr.responseText;
                popupscreen.style.display="block";
                dimmer.style.backgroundColor="#000000";
                eval(document.getElementById("ajaxedjs").innerHTML)
            }
        };
        xhr.open("POST", "<?php echo $server_folder?>reshedulemeeting.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("nid="+nid);
    }

    function submitreshedule(nid) {
        var sdata = $("#frmreshedule").serializeArray();
        var popupscreen = document.getElementById("popupscreen");
        sdata.push({name: "nid", value: nid});
        $.ajax({
            type: "POST",
            url: "<?php echo $server_folder?>reshedulesubmit.php",
            data: sdata, // serializes the form's elements.
            success: function(data)
            {
                switch (data){
                    case "success":
                        popupscreen.style.display="none";
                        popupcontentarea.innerHTML = "";
                        msgbox("The meeting request has being rescheduled.","Meeting rescheduled",1);
                        break;

                    case "0x03":
                        popupscreen.style.display="none";
                        msgbox("The date seems to be in an invalid format. Please make sure that the date is in the format <b>YYYY-MM-DD</b> and make the request.","Invalid date",2,"Okay","unhidepopup");
                        break;

                    case "0x04":
                        popupscreen.style.display="none";
                        msgbox("The time seems to be in an invalid format. Please make sure that the time is in the format <b>HH:MM AM/PM</b> and make the request. For an example <b>12:34 PM</b> is in the correct format.","Invalid time",2,"Okay","unhidepopup");
                        break;

                    case "0x05":
                        popupscreen.style.display="none";
                        msgbox("The date and time you selected should be in the future. Please select a date and a time from the future.","Invalid Date and Time",2,"Okay","unhidepopup");
                        break;

                    default:
                        popupscreen.style.display="none";
                        msgbox("Something went wrong and your meeting request was <b>not</b> sent. Please try again later","Something went wrong",3,"Okay","unhidepopup");
                        break;


                }
            }
        });


    }

    function unhidepopup() {
        var popupscreen = document.getElementById("popupscreen");
        popupscreen.style.display="block";
    }

</script>

<script>
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function clearnotification(nid){
        var seld = document.getElementById(nid);
        var op = 1.0;
        dec_nc();
        var fade = setInterval(function(){
            seld.style.opacity = op;
            op-=0.05;
            if (op <= 0){
                clearInterval(fade);
                seld.outerHTML="";
            }
        }, 10);

    }

</script>
