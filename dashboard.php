<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
    header("location:login.php");
    exit; // Assurez-vous de terminer le script après la redirection
}

include_once "admin_class.php";
include_once "user_class.php";
$reservation_count = Admin::getReservationCount();
$expert_count = Admin::getExpertCount();
$consultation = Admin::getReservations();
$user_count = User::getUsersCount();

$data = User::chartConsultation();
if ($data) {
    $dates = json_encode($data['dates']);
    $nombreConsultations = json_encode($data['nombreConsultations']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Ikigai | Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="images/icone_ikigai-removebg-preview.png" width="40px" alt="">
                        </span>
                        <span class="title">Ikigai</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>

                <li>
                    <a href="page_experts.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Experts</span>
                    </a>
                </li>

                <li>
                    <a href="page_consultat.php">
                        <span class="icon">
                            <ion-icon name="call-outline"></ion-icon>
                        </span>
                        <span class="title">Consultations</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Se déconnecter</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <p>Bonjour, <?php echo $_SESSION['user'] ?></p>
            </div>
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $expert_count; ?></div>
                        <div class="cardName">Total experts</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $reservation_count; ?></div>
                        <div class="cardName">Total consultations</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $user_count; ?></div>
                        <div class="cardName">Total utilisateurs</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Chartjs ================= -->
            <div class="cardHeader" style="margin: 30px;">
                        <h2>Liste experts</h2>
                    </div>
            <div style="width: 90%; margin: 30px auto;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var dates = <?php echo $dates; ?>;
        var nombreConsultations = <?php echo $nombreConsultations; ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        var graphiqueConsultations = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Nombre de consultations',
                    data: nombreConsultations,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>