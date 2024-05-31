<style>
    .navigation ul {
    list-style-type: none;
    padding: 0;
}

.navigation ul li a {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.navigation ul li a .icon{
    height: unset !important;
}


</style>
<link rel="stylesheet" href="assets/css/style.css">
<div class="navigation">
    <ul>
        <li>
            <a href="dashboard.php">
                <span class="icon">
                    <img src="images/icone_ikigai-removebg-preview.png" width="40px" alt="">
                </span>
                <span class="title">Ikigai</span>
            </a>
        </li>
        <li>
            <a href="dashboard.php">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
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


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
