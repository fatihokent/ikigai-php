<?php
include_once "connection.php";
class User {
    public $id_user;
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $pass;

    public function __construct($nom, $prenom, $telephone, $email, $pass) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function register() {
        try {
            $conn = Connect::getInstance()->Connection();
            $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, pass) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->nom, $this->prenom, $this->email, $this->pass]);
            return true;
        } catch(PDOException $e) {
            echo "Error d'enregistrement: " . $e->getMessage();
            return false;
        }
    }

    public static function login($email, $pass) {
        try {
            $conn = Connect::getInstance()->Connection();
            $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ? AND pass = ?");
            $stmt->execute([$email, $pass]);
            $user = $stmt->fetch();
            if($user) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function listerExperts() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert");
            $stmt->execute();
            $experts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $experts;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getExpertsByDomaine() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT specialite FROM expert GROUP BY specialite");
            $stmt->execute();
            $experts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $experts;
        } catch(PDOException $e) {
            echo "Erreur domaine des experts: " . $e->getMessage();
            return [];
        }
    }

    public static function getUsersCount() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT COUNT(*) AS nombre_user FROM utilisateur");
            $stmt->execute();
            $experts = $stmt->fetch(PDO::FETCH_ASSOC);
            return $experts['nombre_user'];
        } catch(PDOException $e) {
            echo "Erreur de trouver nombre user: " . $e->getMessage();
            return false;
        }
    }

    public static function chartConsultation(){
        try {
            $conn = Connect::getInstance()->connection();
            $sql = $conn->prepare("SELECT date_consu, COUNT(*) as nombre_consultations FROM consultation GROUP BY date_consu");
            $sql->execute();

            $dates = array();
            $nombreConsultations = array();

            // Parcourir les résultats de la requête et stocker les données dans les tableaux
                while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $dates[] = $row['date_consu'];
                    $nombreConsultations[] = $row['nombre_consultations'];
                }
            return array("dates" => $dates, "nombreConsultations" => $nombreConsultations);
        } catch (PDOException $e) {
            echo "Erreur de trouver consultations pour CHART: " . $e->getMessage();
            return false;
        }
    }

}
?>
