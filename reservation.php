<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une</title>
    <style>
        .calendar {
            width: 300px;
            border-collapse:collapse;
        }
        .calendar th .calendar td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        .calendar .taken {
            background-color: #ccc;
        }
        .month {
            display: none;
        }
        .current-month {
            display: block;
        }
    </style>
</head>
<body>
<h2>Choisissez une date pour votre consultation</h2>
    <button id="prev">Mois précédent</button>
    <button id="next">Mois suivant</button>
    <form action="#" method="post">
        <input type="hidden" id="selectedDate" name="selectedDate" value="">
        <button type="submit" name="submit">Confirmer la date</button>
    </form>

    <?php
    // Connexion à la base de données et récupération des dates de consultation déjà prises
    $pdo = new PDO('mysql:host=localhost;dbname=soutenance', 'root', 'root');
    $query = "SELECT date_consu FROM consultation";
    $statement = $pdo->query($query);
    $dates_prises = $statement->fetchAll(PDO::FETCH_COLUMN);

    // Initialisation de la date de début (à ajuster selon vos besoins)
    $date_debut = strtotime('first day of this month');
    $dates_mois = array(); // Tableau pour stocker les informations sur les mois
    
    for ($i = 0; $i < 12; $i++) {
        $mois = date('n', $date_debut);
        $annee = date('Y', $date_debut);
        $dates_mois[] = array('mois' => $mois, 'annee' => $annee);
        $date_debut = strtotime('+1 month', $date_debut);
    }

    foreach ($dates_mois as $key => $date_info) {
        $mois_actuel = $date_info['mois'];
        $annee_actuelle = $date_info['annee'];
        echo '<div class="month' . ($key === 0 ? ' current-month' : '') . '">';
        echo '<h3>' . date('F Y', mktime(0, 0, 0, $mois_actuel, 1, $annee_actuelle)) . '</h3>';
        echo '<table class="calendar">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Lun</th>';
        echo '<th>Mar</th>';
        echo '<th>Mer</th>';
        echo '<th>Jeu</th>';
        echo '<th>Ven</th>';
        echo '<th>Sam</th>';
        echo '<th>Dim</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $jour_actuel = date('N', mktime(0, 0, 0, $mois_actuel, 1, $annee_actuelle));
        echo '<tr>';
        for ($j = 1; $j < $jour_actuel; $j++) {
            echo '<td></td>';
        }
        $nombre_jours = cal_days_in_month(CAL_GREGORIAN, $mois_actuel, $annee_actuelle);
        for ($jour = 1; $jour <= $nombre_jours; $jour++) {
            $date = date('Y-m-d', mktime(0, 0, 0, $mois_actuel, $jour, $annee_actuelle));
            $classe = in_array($date, $dates_prises) ? 'taken' : '';
            echo '<td class="' . $classe . '">' . $jour . '</td>';
            if (date('N', mktime(0, 0, 0, $mois_actuel, $jour, $annee_actuelle)) == 7) {
                echo '</tr>';
                if ($jour < $nombre_jours) {
                    echo '<tr>';
                }
            }
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    ?>

    <script>
        
        const months = document.querySelectorAll('.month');
        let currentMonth = 0;
        months[currentMonth].classList.add('current-month');

        const prev = document.querySelector('#prev');
        const next = document.querySelector('#next');

        prev.addEventListener('click', () => {
            months[currentMonth].classList.remove('current-month');
            currentMonth = (currentMonth - 1 + months.length) % months.length;
            months[currentMonth].classList.add('current-month');
        });
        next.addEventListener('click', () => {
            months[currentMonth].classList.remove('current-month');
            currentMonth = (currentMonth + 1) % months.length;
            months[currentMonth].classList.add('current-month');
        });

    const cases = document.querySelectorAll('.calendar td:not(:empty)');
    let selectedDate;

    cases.forEach((caseElement) => {
        caseElement.addEventListener('click', () => {
            selectedDate = caseElement.textContent;
            console.log(selectedDate); // Affiche la date sélectionnée dans la console
        });
    });

    function selectDate(date) {
    selectedDate = date;
    document.getElementById("selectedDate").value = selectedDate; // Mettre à jour la valeur de l'élément input
    console.log("Date sélectionnée:", selectedDate);
    // Vous pouvez utiliser la variable selectedDate ici pour effectuer d'autres actions
}

    </script>
</body> 
</html>