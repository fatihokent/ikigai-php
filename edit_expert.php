<?php 
include_once "admin_class.php";
$expert = Admin::findexpert($_GET['id']);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition de l'expert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="mx-auto">
    <form method="post" action="update.php"  enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?=$expert['id_expert']?>">
    <div class="mb-3">
        <label for="nom_complet" class="form-label">Nouveau Nom et prénom :</label>
        <input value="<?=$expert['nom_complet']?>" name="nom_complet" type="text" required class="form-control" id="nom_complet" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="specialite" class="form-label">Nouvelle spécialité :</label>
        <input  value="<?=$expert['specialite']?>" name="specialite" type="text" class="form-control" id="specialite" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Nouveau téléphone :</label>
        <input  value="<?=$expert['telephone']?>" name="telephone" type="text" class="form-control" id="telephone" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Nouveau mail :</label>
        <input  value="<?=$expert['email']?>" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="mot_passe" class="form-label">Nouveau mot de passe :</label>
        <input  value="<?=$expert['mot_passe']?>" name="mot_passe" type="password"  class="form-control" id="mot_passe" aria-describedby="emailHelp">
        <input type="checkbox" onclick="togglePassword()"> Afficher le mot de passe
    </div>
    <div class="mb-3">
            <label for="photo" class="form-label">Reselectionner l'image</label>
            <input type="file" class="form-control" name="photo">    
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("mot_passe");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
  <button type="submit" class="btn btn-success">Modifier</button>
  <button type="button" class="btn btn-primary"><a class="link-light" href="page_experts.php">Revenir</a></button>
</form>
    </div>
</div>
    
</body>
</html>