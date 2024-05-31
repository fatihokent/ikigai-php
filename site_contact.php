<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icone_ikigai-removebg-preview.png">

    <title>Ikigai - Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets1/css/style.css">
    <link rel="stylesheet" href="assets1/css/fontawesome.css">
    <link rel="stylesheet" href="assets1/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets1/css/owl.css">
    <link rel="stylesheet" href="assets1/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
                      <li><a href="experts.php">Nos experts</a></li>
                      <li><a href="site_contact.php" class="active">Contact</a></li>
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
          <span class="breadcrumb"><a href="site_contact.php">Ikigai</a>  /  Nous contacter</span>
          <h3>Contact</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Contact</h6>
            <h2>Soyez en contact avec notre équipe!</h2>
            <p>Si vous avez des réclamations ou des questions, n'hésitez pas à contacter notre service client via téléphone, mail ou ce formulaire de contact.</p>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="item phone">
                <img src="assets1/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>06 13 45 76 00<br><span>Numéro de téléphone</span></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item email">
                <img src="assets1/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@ikigai.com<br><span>Adresse mail</span></h6>
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-6">
        <form id="contact-form" action="contact.php" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Nom complet</label>
                  <input type="name" name="name" id="name" placeholder="Votre Nom complet..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Adresse mail</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Objet</label>
                  <input type="subject" name="subject" id="subject" placeholder="Objet..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Votre Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Envoyer</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div id="message-container"></div>

        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "footer.php"; ?>

<script>
    document.getElementById('contact-form').addEventListener('submit', function (event) {
        event.preventDefault(); // Empêche la soumission du formulaire

        // Effectuez une requête AJAX pour soumettre le formulaire
        var formData = new FormData(this);

        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Mettez à jour le contenu de #message-container avec le message renvoyé par PHP
            document.getElementById('message-container').innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur lors de la soumission du formulaire:', error);
        });
    });

</script>
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