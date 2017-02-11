<html>
<head>
    <title>USER </title>
    <link rel="stylesheet" type="text/css" href="../public/css/artista.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body class="welcome_body">
<div class="welcome_top_gradient"></div>
<script>
    var step;
    step = 2;
</script>
<div class="welcome_section_banner">
    Password Reset
</div>
<div class="dbox welcome_section_maindbox">
    <?php include("./template/steps.php"); ?>
    <?php include("./template/noaccountfound.php"); ?>
    <?php include("./template/accountFound.php"); ?>
    

</div>



</body>


</html>