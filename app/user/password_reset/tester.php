<html>
<head>
<?php
define("hris_access",true);
require_once('../../templates/path.php');
include('../../templates/_header.php');
?>
</head>
<body>
<div id="shared_info_container">
    <div class="contact_info_item edit_profile_contactinfo_item">
        <div class="edit_profile_contactinfo_item_field" >asdad</div>
        <div class="edit_profile_contactinfo_item_remove" onclick='this.parentElement.outerHTML="";'></div>
        <div class="edit_profile_contactinfo_item_value">asdasdasd</div>
    </div>
    <div class="contact_info_item edit_profile_contactinfo_item">
        <div class="edit_profile_contactinfo_item_field">asdasd</div>
        <div class="edit_profile_contactinfo_item_remove" onclick='this.parentElement.outerHTML="";'></div>
        <div class="edit_profile_contactinfo_item_value">asdadasdasdasde</div>
    </div>
    <div class="contact_info_item edit_profile_contactinfo_item">
        <div class="edit_profile_contactinfo_item_field">asdasdasdsadasdas</div>
        <div class="edit_profile_contactinfo_item_remove" onclick='this.parentElement.outerHTML="";'></div>
        <div class="edit_profile_contactinfo_item_value">sssssssssssssssssse</div>
    </div>
</div>
<button onclick="ss();">SDS</button>


<script src="<?php echo $publicPath?>js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $publicPath?>js/jquery.validate.min.js"></script>
<script src="<?php echo $publicPath?>js/bday-picker.js"></script>
<script>
    function ss() {
        x = document.getElementsByClassName("contact_info_item edit_profile_contactinfo_item");
        var i;
        for (i = 0; i < x.length; i++) {
            alert(x[i].getElementsByClassName("edit_profile_contactinfo_item_field")[0].innerHTML);
        }

    }
</script>
</body>


</html>