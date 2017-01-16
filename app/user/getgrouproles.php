<option value="-1" selected>Unset</option>
<?php
$conn = null;
require_once("./config.conf");
require_once("../database/database.php");
$group_id = $_REQUEST['id'];
$query32 = "SELECT DISTINCT role,group_id FROM group_member WHERE group_id=$group_id  ORDER BY role asc;";
//echo $query32;
$result = mysqli_query($conn,$query32);
if (mysqli_num_rows($result)){
    while ($row_qt =  mysqli_fetch_assoc($result)){
        echo "<option value='".$row_qt['role']."'>".$row_qt['role']."</option>";
    }
}
?>