<?php
include_once "connection.php";
class Consultation {
    public $id;
    public $date_consu;
    public $heure_debut;
    public $domaine;
    public $duree;
    public $montant;

    public function __construct($date_consu, $heure_debut, $domaine, $duree, $montant) {
        $this->date_consu = $date_consu;
        $this->heure_debut = $heure_debut;
        $this->domaine = $domaine;
        $this->duree = $duree;
        $this->montant = $montant;
    }

    public static function deleteConsult($idConsul) {
        try {
            $conn = Connect::getInstance()->connection();
            $sql = "DELETE FROM consultation WHERE idConsul=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idConsul]);
            return true;
        } catch(PDOException $e) {
            echo "Erreur de suppression de consultation: " . $e->getMessage();
            return false;
        }
    }

    // Fonction pour récupérer les informations des consultations
    public static function getConsultationsInfo() {
        try {
            $conn = Connect::getInstance()->connection();
            $sql = $conn->prepare("SELECT c.id, c.date_consu, c.heure_debut, c.domaine, c.duree, c.montant, CONCAT(u.nom, ' ', u.prenom) AS nom_client, e.nom_complet AS nom_expert FROM consultation c
            JOIN utilisateur u ON c.id_user = u.id_user
            JOIN expert e ON c.id_expert = e.id_expert");
            $sql->execute();
            
            $consultations = array();
            
            while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $consultations[] = $row;
            }
            
            return $consultations;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des informations des consultations : " . $e->getMessage();
            return false;
        }
    }


    public function bookConsultation($idUser, $idExpert, $date, $heure, $domaine, $duree, $montant) {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("INSERT INTO consultation (id_user, id_expert, date_consu, heure_debut, domaine, duree, montant) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$idUser, $idExpert, $date, $heure, $domaine, $duree, $montant]);
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public static function checkUserExists($email) {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT COUNT(*) FROM utilisateur WHERE email = ?");
            $stmt->execute([$email]);
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch(PDOException $e) {
            echo "Erreur lors de la vérification de l'existence de l'utilisateur: " . $e->getMessage();
            return false;
        }
    }

    // Fonction pour ajouter un nouvel utilisateur et récupérer son ID
    public static function addUser($nom, $prenom, $telephone, $email) {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, telephone, email) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $telephone, $email]);
            $idUtilisateur = $conn->lastInsertId(); // Récupérer l'ID du nouvel utilisateur inséré
            return $idUtilisateur;
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur: " . $e->getMessage();
            return false;
        }
    }

    public static function addTel($telephone, $email){
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("UPDATE utilisateur SET telephone = ? WHERE email = ?");
            $stmt->execute([$telephone, $email]);
            $idUtilisateur = $conn->lastInsertId(); // Récupérer l'ID du nouvel utilisateur inséré
            return $idUtilisateur;
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout du téléphone: " . $e->getMessage();
            return false;
        }
    }
}
?>
