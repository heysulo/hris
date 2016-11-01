<?php
$conn = null;
require_once("../user/config.conf");
require_once ("../database/database.php");
$user_input = htmlspecialchars("Sandaru");
//$contact_query = "SELECT * from member where lcase(concat(first_name,\" \",last_name))=lcase(\"$user_input;\") or lcase(concat(first_name,\" \",middle_name,\" \",last_name))=lcase(\"$user_input;\") or  lcase(concat(first_name,\" \",middle_name))=lcase(\"$user_input;\") or  lcase(concat(middle_name,\" \",last_name))=lcase(\"$user_input;\") or lcase(first_name)=lcase(\"$user_input;\")  or lcase(middle_name)=lcase(\"$user_input;\") or lcase(last_name)=lcase(\"$user_input;\")";
$contact_query = "SELECT * from member where lcase(concat(first_name,\" \",last_name))=lcase(\"$user_input\") or lcase(concat(first_name,\" \",middle_name,\" \",last_name))=lcase(\"$user_input\") or  lcase(concat(first_name,\" \",middle_name))=lcase(\"$user_input\") or  lcase(concat(middle_name,\" \",last_name))=lcase(\"$user_input\") or lcase(first_name)=lcase(\"$user_input\")  or lcase(middle_name)=lcase(\"$user_input\") or lcase(last_name)=lcase(\"$user_input\")";
$res_contact_query = mysqli_query($conn,$contact_query);
if (mysqli_num_rows($res_contact_query)){
    while ($row_qt =  mysqli_fetch_assoc($res_contact_query)){
        echo $row_qt["first_name"]." ";
    }
}else{
    echo "No Contact Info Found";
}