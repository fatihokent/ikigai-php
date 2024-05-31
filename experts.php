<?php
include_once "expert_class.php";
$expertCon = Expert::afficherExperConv();
$expertDev = Expert::afficherExperDev();
$coach = Expert::afficherCoach();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icone_ikigai-removebg-preview.png">

    <title>Ikigai - Liste des experts</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets1/css/style.css">
    <link rel="stylesheet" href="assets1/css/fontawesome.css">
    <link rel="stylesheet" href="assets1/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets1/css/owl.css">
    <link rel="stylesheet" href="assets1/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i>info@ikigai.com</li>
            <li><i class="fa fa-map"></i>lacasacoworking, Av. 2 Mars, Casablanca </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="https://www.tiktok.com/fr/" target="_blank"><i class="fab fa-tiktok"></i></a></li>
            <li><a href="https://fr.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img class="ikigai" src="assets1/images/1-removebg-preview.png" alt="logo ikigai" width="100px">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="index.php">Ikigai</a></li>
                      <li><a href="experts.php" class="active">Nos experts</a></li>
                      <li><a href="site_contact.php">Contact</a></li>
                      <?php if(isset($_SESSION['user'])) { ?>
                          <li><a href="logout.php">Se déconnecter</a></li>
                      <?php } else { ?>
                          <li><a href="login.php">Se connecter</a></li>
                      <?php } ?>
                      <li><a href="booking.php" class="consul">Consulter Maintenant</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="experts.php">Ikigai</a> / Experts</span>
          <h3>Nos experts</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
    <div class="container">
      <ul class="properties-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Tout les experts</a>
        </li>
        <li>
          <a href="#!" data-filter=".cp">Conversion professionnelle</a>
        </li>
        <li>
          <a href="#!" data-filter=".dev">Développement personnel</a>
        </li>
        <li>
          <a href="#!" data-filter=".car">Coaching de carrière</a>
        </li>
      </ul>
      <div class="row properties-box">
        <?php foreach ($expertCon as $Con) {   ?>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 cp text-center">
          <div class="item">
            <a href="experts.php"><img width="200px" height="200px" src="<?=$Con['photo']?>" alt=""></a>
            <span class="category"><?=$Con['specialite']?></span>
            <h4><a href="experts.php"><?=$Con['nom_complet']?></a></h4>
            <ul>
              <li>Expérience: <span>15 ans</span></li>
              <li>Entamé une reconversion pro</li>
            </ul>
            <div class="main-button">
              <a href="booking.php">Consulter maintenant</a>
            </div>
          </div>
        </div>
        <?php } ?>

        <?php foreach ($expertDev as $Dev) {   ?>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 dev text-center">
          <div class="item">
            <a href="experts.php"><img width="200px" height="200px" src="<?=$Dev['photo']?>" alt=""></a>
            <span class="category"><?=$Dev['specialite']?></span>
            <h4><a href="experts.php"><?=$Dev['nom_complet']?></a></h4>
            <ul>
              <li>Expérience: <span>7 ans</span></li>
              <li>Coach et consultant</li>
            </ul>
            <div class="main-button">
              <a href="booking.php">Consulter maintenant</a>
            </div>
          </div>
        </div>
        <?php } ?>

        <?php foreach ($coach as $co) {   ?>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 car text-center">
          <div class="item">
            <a href="experts.php"><img width="200px" height="200px" src="<?=$co['photo']?>" alt=""></a>
            <span class="category"><?=$co['specialite']?></span>
            <h4><a href="experts.php"><?=$co['nom_complet']?></a></h4>
            <ul>
              <li>Expérience: <span>10 ans</span></li>
              <li>Conférencier</li>
            </ul>
            <div class="main-button">
              <a href="booking.php">Consulter maintenant</a>
            </div>
          </div>
        </div>
        <?php } ?>


      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a class="is_active" href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <?php include_once "footer.php"; ?>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets1/js/isotope.min.js"></script>
  <script src="assets1/js/owl-carousel.js"></script>
  <script src="assets1/js/counter.js"></script>
  <script src="assets1/js/custom.js"></script>

  </body>
</html>