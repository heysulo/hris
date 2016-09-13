<div class="bottomPanel">
    <div class="group_div_intro">
        <div class="group_logo_box"></div>
        <div class="group_intro_content">
            <div class="group_name">Computer Science Society</div>
            
            <div>
                Public Community Group<br>
                12,232 Members<br>
            </div> 
            <div class="group_short_description">
                The University of Colombo Gavel Club is affiliated to Toastmasters International USA and was chartered in October 2014. The main objectives of the club are to develop communication, presentation and leadership skills among the undergraduates.
            </div>
            
        </div>
    </div>
    <div class="group_div_content">
        <div class="group_div_content_post">
            <div class="dbox group_dbox_post">

                <div class="group_post_writer_navbar_area">
                    <ul class="group_post_writer_navbar">
                        <li class="group_post_writer_navbar_item group_post_writer_text">Write Post</li>
                        <li class="group_post_writer_navbar_item_seperator"></li>
                        <li class="group_post_writer_navbar_item group_post_writer_image">Add Photo</li>
                        <li class="group_post_writer_navbar_item_seperator"></li>
                        <li class="group_post_writer_navbar_item group_post_writer_file">Add File</li>
                    </ul>
                </div>

                <textarea class="group_post_writer_textarea" placeholder="Post your content here ...."></textarea>
                <div class="group_writer_bottom" align="right">

                    <button class="msgbox_button group_writer_button" onclick='closemsgbox();window.alert(";)");'>Continue</button>

                </div>
            </div>

            <?php
                for ($i=0;$i<20;$i++){
                    include("./templates/post.php");
                }

            ?>
        </div>
        <div class="group_div_content_extra"></div>
    </div>

</div>

