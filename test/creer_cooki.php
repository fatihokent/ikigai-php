<?php
    extract($_POST);
    setcookie("nom",$name,time()+60);
    setcookie("age",$age,time()+60);
    if (empty($name) || empty($age)) {
        header("location:forrm.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>bravo</h2>
</body>
</html>