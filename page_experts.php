<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
    header("location:login.php");
    exit;
}


include_once "admin_class.php";
include_once "connection.php";
include_once "user_class.php";
$experts = User::listerExperts();
include_once "_menu.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ikigai | Gestion Experts</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="pop.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <p>Bonjour, <?php echo $_SESSION['user'] ?></p>

            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Liste experts</h2>
                    </div>

                    <form action="delete_expert.php" method="post">
                    <table>
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
                                    <td><img src="<?= $e['photo']; ?>" width="100" class="rounded-circle"></td>
                                    <td><?=$e['nom_complet']?></td>
                                    <td><?=$e['specialite']?></td>
                                    <td><?=$e['telephone']?></td>
                                    <td><?=$e['email']?></td>
                                    <td><?=$e['mot_passe']?></td>
                                    <td>
                                        <a href="delete_expert.php?id=<?=$e['id_expert']?>" class="status return">S</a>
                                        <a href="#" class="status pending" data-id="<?=$e['id_expert']?>">M</a>
                                    </td>
                                    <td>
                                    <input type="checkbox" name="ids[]" value="<?= $e['id_expert'] ?>">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="status return">Supprimer sélectionnés</button>
                    <button type="button" id="popup-link" class="status delivered">Ajouter</button>
                    
                </div>
            </form>
            <div id="popup-window"></div>  
            <div id="pop-window-edit"></div>
      
            </div>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>


<script>
  // Get the elements by their ID
  var popupLink = document.getElementById("popup-link");
  var popupWindow = document.getElementById("popup-window");
  // Show the pop-up window when the link is clicked
  popupLink.addEventListener("click", function(event) {
    popupWindow.style.display = "block";
    fetch('create_expert.php')
            .then(response => response.text())
            .then(data => {
        document.getElementById('popup-window').innerHTML = data;
    });
  });

var popLink = document.getElementsByClassName("status pending");
var popupWindowEdit = document.getElementById("pop-window-edit");

// Show the pop-up window when the link is clicked
for (var i = 0; i < popLink.length; i++) {
  popLink[i].addEventListener("click", function(event) {
    var id = this.getAttribute("data-id");
    popupWindowEdit.style.display = "block";
    fetch('edit_expert.php?id=' + id)
      .then(response => response.text())
      .then(data => {
        document.getElementById('pop-window-edit').innerHTML = data;
    });
  });
}



</script>  

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>