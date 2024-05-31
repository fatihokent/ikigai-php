<?php 
include_once "connection.php";
include_once "user_class.php";
$experts = User::listerExperts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des experts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <form action="delete_expert.php" method="post">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Expert</th>
      <th scope="col">Image</th>
      <th scope="col">Nom Complet</th>
      <th scope="col">Spécialité</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Email</th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Action</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($experts as $e) {   ?>
    <tr>
      <th scope="row"><?=$e['id_expert']?></th>
      <td><img src="<?= $e['photo']; ?>" width="200" class="rounded-circle"></td>
      <td><?=$e['nom_complet']?></td>
      <td><?=$e['specialite']?></td>
      <td><?=$e['telephone']?></td>
      <td><?=$e['email']?></td>
      <td><?=$e['mot_passe']?></td>
      <td>
        <a href="delete_expert.php?id=<?=$e['id_expert']?>" class="btn btn-danger">S</a>
        <a href="edit_expert.php?id=<?=$e['id_expert']?>" class="btn btn-warning">M</a>
      </td>
      <td>
      <input type="checkbox" name="ids[]" value="<?= $e['id_expert'] ?>">
      </td>
</tr>
<?php } ?>
</tbody>
</table>
<button type="submit" class="btn btn-danger">Supprimer sélectionnés</button>
</form>
</div>

</body>
</html>