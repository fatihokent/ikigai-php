<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nouveau expert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<?php
include_once "expert_class.php"
?>
  <div class="container-fluid">
    <div class="mx-auto">
      <form method="post" action="store.php" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nom_complet" class="form-label">Nom complet :</label>
          <input name="nom_complet" type="text" required class="form-control" id="nom_complet" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="specialite" class="form-label">Spécialité :</label>
          <input name="specialite" type="text" required class="form-control" id="specialite" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="telephone" class="form-label">Téléphone :</label>
          <input name="telephone" type="text" required class="form-control" id="telephone" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email :</label>
          <input name="email" type="email" required class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="mot_passe" class="form-label">Mot de passe :</label>
          <input name="mot_passe" type="password" required class="form-control" id="mot_passe" aria-describedby="emailHelp">
          <input type="checkbox" onclick="togglePassword()"> Afficher le mot de passe
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Image sélectionnée</label>
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
        <button type="submit" class="btn btn-success">Envoyer</button>
        <button type="button" class="btn btn-primary"><a class="link-light" href="page_experts.php">Revenir</a></button>
      </form>
    </div>
  </div>

</body>

</html>