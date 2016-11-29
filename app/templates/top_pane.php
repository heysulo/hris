<?php
    include_once ("path.php");
    defined('hris_access') or die(header("location:../../error.php"));
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $type  = $_SESSION['type'];
    $email = $_SESSION['email'];
    $pro_pic = $_SESSION['pro_pic'];
    
?>
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
                var resp = JSON.parse(this.responseText);
                var tmp = document.getElementById("dummynf").innerHTML;
                tmp = tmp.replace("%content%",resp.msg);
                tmp = tmp.replace("<--icon-->",resp.icon);
                tmp = tmp.replace("%nid%",resp.nid);
                tmp = tmp.replace("%nid%",resp.nid);
                nfc.innerHTML+= tmp;
                document.getElementById("audio_notify").play();
                inc_nc();


            }
            if (this.readyState == 4){
                notificationpoll();
            }
        };
        xhttp.open("GET", "<?php echo $server_folder?>notificationpoll.php", true);
        xhttp.send();
    }
    notificationpoll(); //init call
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
