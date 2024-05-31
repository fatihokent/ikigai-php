<?php
include_once "user_class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de consultation</title>
</head>
<body>
    <div class="reservation-container">
        <h2>Réservation de consultation</h2>
        <form action="reserver.php" method="post">
        <div id="step-container">
            <!-- Étapes de réservation -->
            <div id="step1">
                <h3>Choisissez un domaine</h3>
                <div class="domaine-container">
                    <?php
                    $domaines = User::getExpertsByDomaine();
                    foreach ($domaines as $domaine) { ?>
                    <div class="card" onclick="selectDomaine('<?= $domaine['specialite'] ?>')">
                        <h5 class="card-title"><?= $domaine['specialite'] ?></h5>
                    </div>
                    <?php } ?>
                </div>

                <button onclick="nextStep(1)">Suivant</button>
            </div>
            <div id="step2" style="display: none;">
                <h3>Choisissez un expert</h3>
                <button onclick="previousStep(2)">Précédent</button>
                <div class="card-container">
                <?php
                        $experts = User::listerExperts();
                        foreach ($experts as $expert) { 
                            $nom_complet = $expert['nom_complet'];
                            $photo = $expert['photo'];    
                        ?>
                    <div class="card">
                        <img src="<?= $photo ?>" alt="<?= $nom_complet ?>">
                        <div class="card-info">   
                            <h3><?= $nom_complet ?></h3>
                        </div>
                    </div>
                <?php } ?>   

                </div>
                <button onclick="nextStep(2)">Suivant</button>
            </div>
            <div id="step3" style="display: none;">
                <h3>Choisissez la durée</h3>
                <button onclick="previousStep(3)">Précédent</button>
                <div class="duree-container">
                    <?php
                    $durees = [
                        ['duree' => '30', 'montant' => '10'],
                        ['duree' => '60', 'montant' => '20'],
                        ['duree' => '90', 'montant' => '30']
                    ];

                    foreach ($durees as $duree) { ?>
                        <div class="card" onclick="selectDuree('<?= $duree['duree'] ?>', '<?= $duree['montant'] ?>')">
                            <h3><?= $duree['duree'] ?> minutes</h3>
                            <p class="prix">Montant: <?= $duree['montant'] ?> €</p>
                        </div>
                    <?php } ?>
                </div>
                <button onclick="nextStep(3)">Suivant</button>
            </div>
            <div id="step4" style="display: none;">
                <h3>Choisissez la date et l'heure</h3>
                <button onclick="previousStep(4)">Précédent</button>
                <input type="datetime-local" id="date-heure" name="date-heure" onchange="updateDateAvailability()">
                <button onclick="nextStep(4)">Suivant</button>
            </div>
            <div id="step5" style="display: none;">
                <h3>Remplissez vos informations</h3>
                <button onclick="previousStep(5)">Précédent</button>
                <form id="user-form" onsubmit="reserveConsultation()">
                    <input type="text" id="nom" name="nom" placeholder="Nom" required>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
                    <input type="tel" id="telephone" name="telephone" placeholder="Téléphone" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <button type="submit">Réserver</button>

                </form>
            </div>
        </div>
        </form>
    </div>
    <script>
        let currentStep = 1;
        let selectedDomaine = '';
        let selectedExpert = '';
        let selectedDuree = '';
        let selectedMontant = '';

        function selectExpert(expert) {
            selectedExpert = expert;
            console.log("Expert sélectionné :", selectedExpert);
        }

        function selectDuree(duree, montant) {
            // Mettre à jour les variables selectedDuree et selectedMontant avec la durée et le montant sélectionnés
        
            selectedDuree = duree;
            selectedMontant = montant;
            console.log("Durée sélectionnée :", selectedDuree);
            console.log("Montant sélectionné :", selectedMontant);
            let dureeCards = document.querySelectorAll('.duree-container .card');
                dureeCards.forEach(card => {card.classList.remove('selected');
            });

            // Ajouter la classe "selected" à l'élément parent de l'élément cliqué
            event.currentTarget.classList.add('selected');
        }

        function selectDomaine(domaine) {
            selectedDomaine = domaine;
            console.log("Domaine sélectionné :", selectedDomaine);
            let cards = document.querySelectorAll('.domaine-container .card');
            cards.forEach(card => {
                card.classList.remove('selected');
            });

            // Ajouter la classe "selected" à l'élément parent de l'élément cliqué
            event.currentTarget.classList.add('selected');
        }

        function nextStep() {
            if (currentStep < 5) {
                document.getElementById(`step${currentStep}`).style.display = "none";
                currentStep++;
                document.getElementById(`step${currentStep}`).style.display = "block";
            }
        }
        function previousStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).style.display = "none";
                currentStep--;
                document.getElementById(`step${currentStep}`).style.display = "block";
            }
        }


    </script>
</body>
</html>
