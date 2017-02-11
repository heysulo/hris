<?php
    include_once ("path.php");
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


            <!--User detail showing bar-->
            <div class="topsearchbar">
                <form action="basic_search.php" method="get">

                    <input type="text" name="search" placeholder="Search.." class="topheadersearch" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
                </form>
            </div>

            <div class="topprofilecontent" id="top_profile_content_bar" >
                <div>

                    <div class=""><img class="topprofilepicture"  alt=""></div>
                    <div class="topbox_profile_name"> Public User Mode</div>
                    <div class="topbox_profile_role">Guest</div>
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


</ul>

<script>
    var title_flag = true;
    var title_blinker = 0;
    var original_title = "HRIS";


    function unhidepopup() {
        var popupscreen = document.getElementById("popupscreen");
        popupscreen.style.display="block";
    }

</script>

<script>
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }


</script>
