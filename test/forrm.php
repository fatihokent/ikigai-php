<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
<form action="creer_cooki.php" method="post">
        <div>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" value="<?php if (isset($_COOKIE['nom'])) {
                echo $_COOKIE['nom'];
            } ?>"><br><br>
        </div>
        <div>
            <label for="age">age</label>
            <input type="number" id="age" name="age" value="<?php if (isset($_COOKIE['age'])) {
                echo $_COOKIE['age'];
            } ?>"><br><br>
        </div>
        <button>submit</button>
    </form>
</body>
</html>