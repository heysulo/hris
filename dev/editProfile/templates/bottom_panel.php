<div class="bottomPanel">
    <div class="profile_section_intro edit_profile_intro_section">
        <div class="profile_profile_image edit_profile_profile_image"><div class="new_propic">Upload Image</div></div>
        <div class="profile_name edit_profile_profile_name">
            <input type="text" id="fname" name="firstname" class="edit_profile_name_textbox" placeholder="First Name">
            <input type="text" id="fname" name="firstname" class="edit_profile_name_textbox" placeholder="Middle Name">
            <input type="text" id="fname" name="firstname" class="edit_profile_name_textbox" placeholder="Last Name">
        </div>
        <div class="profile_basic_summery edit_profile_profile_basic_summery">
            <select>
                <option value="volvo">Student</option>
                <option value="saab">Instructor</option>
                <option value="opel">Lecturer</option>
                <option value="audi">Academic Staff</option>
            </select><br>
            <input type="text" id="fname" name="firstname" class="edit_profile_name_textbox edit_profile_academic_year" placeholder="Academic Year"><br>
            <select>
                <option value="volvo">Male</option>
                <option value="saab">Female</option>
            </select><br>
        </div>

    </div>

    <div class="profile_section_main">
        <div class="profile_section_main_left">
            <?php include("contact_info.php") ?>
            <?php include("socities.php") ?>
            <?php include("languages.php") ?>
        </div>
        <div class="profile_section_main_right">
            <?php include("personal_info.php") ?>
            <?php include("about_me.php") ?>
            <?php include("interetst.php") ?>
        </div>

    </div>
    <div class="edit_profile_floting_save_button">
        <button class="default_button edit_profile_save_all_button">Save All Changes</button>
    </div>
</div>