<html>
<head>
<?php


?>
</head>
<body>
<?php
$host = '192.168.8.100';
$username = 'root';
$password = 'mysqler';
$database = 'hris_db';
$conn = mysqli_connect($host,$username,$password,$database);
echo $conn;
echo $_SERVER['HTTP_HOST'];
?>
</body>


</html>