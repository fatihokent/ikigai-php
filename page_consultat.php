<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
    header("location:login.php");
    exit; 
}

include_once "connection.php";
include_once "_menu.php";
include_once "consultation.php";
$consultations = Consultation::getConsultationsInfo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ikigai | Gestion Consultations</title>
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
                        <h2>Liste Consultations</h2>
                    </div>

                    <form action="delete_consul.php" method="post">
                    <table>
                        <thead>
                            <tr>
                            <th scope="col">ID Consultation</th>
                            <th scope="col">Client</th>
                            <th scope="col">Expert</th>
                            <th scope="col">Date consultation</th>
                            <th scope="col">Heure début</th>
                            <th scope="col">Domaine</th>
                            <th scope="col">Durée</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Action</th>
                            <th scope="col">Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($consultations as $consul) {   ?>
                                <tr>
                                    <th scope="row"><?=$consul['id']?></th>
                                    <td><?=$consul['nom_client']?></td>
                                    <td><?=$consul['nom_expert']?></td>
                                    <td><?=$consul['date_consu']?></td>
                                    <td><?=$consul['heure_debut']?></td>
                                    <td><?=$consul['domaine']?></td>
                                    <td><?=$consul['duree']?></td>
                                    <td><?=$consul['montant']?></td>
                                    <td>
                                        <a href="delete_consul.php?id=<?=$consul['id']?>" class="status return">Supprimer</a>
                                    </td>
                                    <td>
                                    <input type="checkbox" name="ids[]" value="<?= $consul['id'] ?>">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="status return">Supprimer sélectionnés</button>                    
                </div>
            </form> 
            </div>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>