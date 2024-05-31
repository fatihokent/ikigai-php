<?php
session_start();
include_once "admin_class.php";
$experts = Admin::listExpert();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icone_ikigai-removebg-preview.png">

    <title>Ikigai - Votre carrière, notre responsabilité</title>

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
                      <li><a href="index.php" class="active">Ikigai</a></li>
                      <li><a href="experts.php">Nos experts</a></li>
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

  <div class="main-banner">
    <div class="item item-1">
      <video src="assets1/images/anim_logo.mp4" autoplay loop muted playsinline></video>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="left-image">
            <img src="assets1/images/Ikigai.png" width="450px" alt="">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="section-heading">
            <h6>| Avantages</h6>
            <h2>Pourquoi Ikigai ?</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Liste de coachs expérimentés.
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <strong>Tous</strong> nos experts ont des années d'expérience soit dans les ressources humaines, le recrutement, la vente...</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Facilité d'accès.
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  En réservant les consultations <strong> en ligne</strong>, l'accès à l'information est plus rapide.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  En un clic.
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Une fois votre <strong> consultation</strong> réservée, plus qu'à attendre le jour J pour résoudre vos problèmes.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="8" data-speed="1000"></h2>
                   <p class="count-text ">Experts</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="20" data-speed="1000"></h2>
                  <p class="count-text ">Ans<br>d'expérience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                  <p class="count-text ">Clients</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h2>Faire évoluer votre carrière à un autre niveau</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <div class="testimonial-grid">
              <div class="testimonial-container">
                <div class="testimonial-avatar">
                  <img src="assets1/images/customer02.jpg" alt="User Avatar">
                </div>
                <div class="testimonial-text">
                  <p class="testimonial-name">Adam Mounir</p>
                  <p class="testimonial-role">Etudiant en Bac</p>
                  <p>"Avant d'avoir mon diplôme, j'étais perdu concernant ma carrière, mais grâce à Ikigai et aux conseils des experts,
                    j'ai pu trouver ma voie en choisissant d'étudier l'informatique et j'adore."</p>
                </div>
              </div>
              <!-- Testimonial containers... -->
              <div class="testimonial-container">
                <div class="testimonial-avatar">
                  <img src="assets1/images/deal-01.jpg" alt="User Avatar">
                </div>
                <div class="testimonial-text">
                  <p class="testimonial-name">Sara Ktoun</p>
                  <p class="testimonial-role">Photographe</p>
                  <p>"Avant je travaillais salariée dans une entreprise privée comme community manager, mais les horaires de bureaux 
                    n'étaient pas faites pour moi. Alors j'ai décidé de me convertir."</p>
                </div>
              </div>
              <!-- Testimonial containers... -->
              <div class="testimonial-container">
                <div class="testimonial-avatar">
                  <img src="assets1/images/customer01.jpg" alt="User Avatar">
                </div>
                <div class="testimonial-text">
                  <p class="testimonial-name">Saad Rahmouni</p>
                  <p class="testimonial-role">CEO de X Company</p>
                  <p>"Etant CEO, j'ai toute une équipe à gérer, alors pour être dans la même longueur d'onde que mon équipe, j'ai opté
                    pour une consultation en développement personnel et cela m'a aidé."</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Experts</h6>
            <h2>Voici notre sélection des experts</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <?php foreach ($experts as $ex) {   
          if ($experts) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="experts.php"><img width="300px" height="300px" src="<?=$ex['photo']?>" alt=""></a>
            <span class="category"><?=$ex['specialite']?></span>
            <h4><a href="experts.php"><?=$ex['nom_complet']?></a></h4>
            <div class="main-button">
              <a href="booking.php">Consulter</a>
            </div>
          </div>
        </div>
        <?php } else {
          echo "<p>Aucun expert trouvé.</p>";
        }
       } ?>
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Nous contacter</h6>
            <h2>Avez-vous des questions ?</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d26593.76062071587!2d-7.6185061630126905!3d33.573634721988675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d34dd4650d0d%3A0x8d57d54517851db7!2sLa%20Casa%20Coworking!5e0!3m2!1sfr!2sma!4v1708707569408!5m2!1sfr!2sma" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets1/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>06 13 45 76 00<br><span>Numéro de téléphone</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets1/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@ikigai.com<br><span>Adresse mail</span></h6>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
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
      </div>
      <div id="message-container"></div>

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