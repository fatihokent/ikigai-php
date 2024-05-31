<?php
session_start();
// if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
//     header("location:login.php");
//     exit; // Assurez-vous de terminer le script après la redirection
// }


require_once 'connection.php';
require_once 'consultation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $heure = $_POST['hour'];
    $domaine = $_POST['domaine'];
    $duree = $_POST['duration'];
    $montant = $_POST['duration']*10;


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    
    $idExpert = 13; // Assurez-vous de remplacer cette valeur par l'ID de l'expert sélectionné

    if (Consultation::checkUserExists($mail)) {
        // L'utilisateur existe, mettre à jour uniquement le numéro de téléphone
        if (Consultation::addTel($tel, $mail)) {
            echo "Numéro de téléphone mis à jour avec succès.";
        } else {
            echo "Échec de la mise à jour du numéro de téléphone.";
        }
    } else {
        // L'utilisateur n'existe pas, ajouter un nouvel utilisateur avec toutes ses informations
        $userId = Consultation::addUser($nom, $prenom, $tel, $mail);
        $consultation = new Consultation($userId, $idExpert, $date, $heure, $domaine, $duree, $montant);
        if ($userId) {
            if ($consultation->bookConsultation($userId, $idExpert, $date, $heure, $domaine, $duree, $montant)) {
                echo "Succès.";
                //header("location:index.php");
            } else {
                echo "Échec de la réservation de la consultation.";
            }
        } else {
            echo "Échec de l'ajout de l'utilisateur.";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de consultation</title>
    <style></style>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- JQUERY STEP -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

<div class="wrapper">
    <form action="#" method="post">
        <div id="wizard">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <div class="form-row">
                    <input type="radio" id="carriere" name="domaine" class="radio" value="Coaching de carrière" checked>
                    <label for="carriere" class="radio-label">
                        <div class="pic"> <i class="fa-solid fa-business-time" style="font-size: 50px; color: #e29832;"></i> </div>
                        <p>Coaching de carrière</p>
                    </label>
                </div>
                <div class="form-row">
                    <input type="radio" id="dev-personnel" name="domaine" class="radio" value="Développement personnel"/>
                    <label for="dev-personnel" class="radio-label">
                        <div class="pic"> <i class="fa-solid fa-person" style="color: #e29832;"></i> </div>
                        <p>Développement personnel</p>
                    </label>
                </div>
                <div class="form-row">
                    <input type="radio" id="reconversion" name="domaine" class="radio" value="Reconversion profesionnelle">
                    <label for="reconversion" class="radio-label">
                        <div class="pic"> <i class="fa-solid fa-recycle" style="color: #e29832;"></i> </div>
                        <p>Reconversion profesionnelle</p>
                    </label>
                </div>
            </section>
            <!-- SECTION 2 -->
            <h4></h4>
            <section class="expert-grid">
                <div class="form-row">
                    <input type="radio" id="amal" name="expert" class="expert-radio" value="Amal Hihi" checked>
                    <label for="amal" class="expert-label">
                        <div class="pic"> <img class="irc_mut img-fluid" src="images/amal hihi.png" width="100" height="100"> </div>
                        <div class="info">
                            <h6>Reconversion profesionnelle</h6>
                            <p>Amal Hihi</p>
                        </div>
                    </label>
                </div>
                <div class="form-row">
                    <input type="radio" id="tijania" name="expert" class="expert-radio" value="Tijania Birouk">
                    <label for="tijania" class="expert-label">
                        <div class="pic"> <img class="irc_mut img-fluid" src="images/tijania birouk.jpeg" width="100" height="100"> </div>
                        <div class="info">
                            <h6>Développement personnel</h6>
                            <p>Tijania Birouk</p>
                        </div>
                    </label>
                </div>
                <div class="form-row">
                    <input type="radio" id="daniel" name="expert" class="expert-radio" value="Daniel Renaud">
                    <label for="daniel" class="expert-label">
                        <div class="pic"> <img class="irc_mut img-fluid" src="images/Daniel renaud.jpeg" width="100" height="100"> </div>
                        <div class="info">
                            <h6>Coaching de carrière</h6>
                            <p>Daniel Renaud</p>
                        </div>
                    </label>
                </div>
                <div class="form-row">
                    <input type="radio" id="youssef" name="expert" class="expert-radio" value="Youssef Bentahir">
                    <label for="youssef" class="expert-label">
                        <div class="pic"> <img class="irc_mut img-fluid" src="images/youssef bentahir.webp" width="100" height="100"> </div>
                        <div class="info">
                            <h6>Reconversion profesionnelle</h6>
                            <p>Youssef Bentahir</p>
                        </div>
                    </label>
                </div>
            </section>
            <!-- SECTION 3 -->
            <h4></h4>
            <section class="duration-price">
                 <div class="form-dur">
                    <label class="duree" for="duration">Duration:</label>
                    <select id="duration" name="duration">
                        <option value="30">30 minutes - 300 DHS</option>
                        <option value="60">1 heure - 600 DHS</option>
                        <option value="90">1 heure 30 minutes - 900 DHS</option>
                        <!-- Add more duration options as needed -->
                    </select>
                </div>
            </section> 
            <!-- SECTION 4 -->
            <h4></h4>
            <section>
                <div class="form-row"> <input name="date" type="date" class="form-control"> </div>
                <div class="form-row heure">
                    <input type="radio" id="hour-1" name="hour" class="hour-radio" value="10:00">
                    <label for="hour-1" class="hour-label">
                        <div class="hour-pic">10:00</div>
                    </label>
                </div>
                <div class="form-row heure">
                    <input type="radio" id="hour-2" name="hour" class="hour-radio" value="11:00">
                    <label for="hour-2" class="hour-label">
                        <div class="hour-pic">11:00</div>
                    </label>
                </div>
                <div class="form-row heure">
                    <input type="radio" id="hour-3" name="hour" class="hour-radio" value="12:00">
                    <label for="hour-3" class="hour-label">
                        <div class="hour-pic">12:00</div>
                    </label>
                </div>
                <div class="form-row heure">
                    <input type="radio" id="hour-4" name="hour" class="hour-radio" value="13:00">
                    <label for="hour-4" class="hour-label">
                        <div class="hour-pic">13:00</div>
                    </label>
                </div>
                <div class="form-row heure">
                    <input type="radio" id="hour-5" name="hour" class="hour-radio" value="14:00">
                    <label for="hour-5" class="hour-label">
                        <div class="hour-pic">14:00</div>
                    </label>
                </div>
                <div class="form-row heure">
                    <input type="radio" id="hour-6" name="hour" class="hour-radio" value="15:00">
                    <label for="hour-6" class="hour-label">
                        <div class="hour-pic">15:00</div>
                    </label>
                </div>
            </section>
            <!-- SECTION 5 -->
            <h4></h4>
            <section>
                <div class="form-row"> <input name="nom" type="text" class="form-control" placeholder="Nom"> </div>
                <div class="form-row"> <input name="prenom" type="text" class="form-control" placeholder="Prénom"> </div>
                <div class="form-row"> <input name="mail" type="text" class="form-control" placeholder="Email"> </div>
                <div class="form-row"> <input name="tel" type="text" class="form-control" placeholder="Numéro téléphone"> </div>
                <div class="form-row"> <input name="adresse" type="text" class="form-control" placeholder="Adresse"> </div>
            </section>
            <!-- SECTION 6 -->
            <h4></h4>
            <section>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                </svg>
                <p class="success">Votre demande a été prise en compte. Vous allez recevoir un message bientôt.</p>
                <button type="submit" class="bouton">Envoyer le formulaire</button>
            </section>
        </div>
    </form>
</div>
<script>
    jQuery(function(){
	jQuery("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        onStepChanging: function (event, currentIndex, newIndex) { 
            if ( newIndex === 1 ) {
                jQuery('.steps ul').addClass('step-2');
            } else {
                jQuery('.steps ul').removeClass('step-2');
            }
            if ( newIndex === 2 ) {
                jQuery('.steps ul').addClass('step-3');
            } else {
                jQuery('.steps ul').removeClass('step-3');
            }
            if ( newIndex === 3 ) {
                jQuery('.steps ul').addClass('step-4');
            } else {
                jQuery('.steps ul').removeClass('step-4');
            }
            if ( newIndex === 4 ) {
                jQuery('.steps ul').addClass('step-5');
            } else {
                jQuery('.steps ul').removeClass('step-5');
            }

            if ( newIndex === 5 ) {
                jQuery('.steps ul').addClass('step-6');
                jQuery('.actions ul').addClass('step-last');
            } else {
                jQuery('.steps ul').removeClass('step-6');
                jQuery('.actions ul').removeClass('step-last');
            }
            return true; 
        },
        labels: {
            finish: "",
            next: "Next",
            previous: "Précédent"
        }
    });
    // Custom Steps Jquery Steps
    jQuery('.wizard > .steps li a').click(function(){
    	jQuery(this).parent().addClass('checked');
		jQuery(this).parent().prevAll().addClass('checked');
		jQuery(this).parent().nextAll().removeClass('checked');
    });
    // Custom Button Jquery Steps
    jQuery('.forward').click(function(){
    	jQuery("#wizard").steps('next');
    })
    jQuery('.backward').click(function(){
        jQuery("#wizard").steps('previous');
    })
    // Checkbox
    jQuery('.checkbox-circle label').click(function(){
        jQuery('.checkbox-circle label').removeClass('active');
        jQuery(this).addClass('active');
    })
    
})
</script>
</body>
</html>