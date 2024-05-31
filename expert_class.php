<?php
include_once "connection.php";
class Expert {
    public $id_expert;
    public $nom_complet;
    public $specialite;
    public $telephone;
    public $email;
    public $mot_passe;
    public $photo;

    public function __construct($nom_complet, $specialite, $telephone, $email, $mot_passe, $photo) {
        $this->nom_complet = $nom_complet;
        $this->specialite = $specialite;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->mot_passe = $mot_passe;
        $this->photo = $photo;
    }

    public function register() {
        try {
            $conn = Connect::getInstance()->Connection();
            $stmt = $conn->prepare("INSERT INTO expert (nom_complet, specialite, telephone, email, mot_passe) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->nom_complet, $this->specialite, $this->telephone, $this->email, $this->mot_passe]);
            return true;
        } catch(PDOException $e) {
            echo "Erreur pour créer compte " . $e->getMessage();
            return false;
        }
    }

    public static function login($email, $password) {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert WHERE email = ? AND mot_passe = ?");
            $stmt->execute([$email, $password]);
            $expert = $stmt->fetch();
            if($expert) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function afficherConsultations() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM consultation WHERE id_expert = ?");
            $stmt->execute([['id_expert']]);
            $consultations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $consultations;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function addExpert() {
        try {
            $conn = Connect::getInstance()->connection();
            $sql = "INSERT INTO expert (nom_complet, specialite, telephone, email, mot_passe, photo) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->nom_complet, $this->specialite, $this->telephone, $this->email, $this->mot_passe, $this->photo]);
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public static function uploadimg($photo) {
        $name = $photo['name'];
        $tmp = $photo['tmp_name'];
        $photo = "images/$name";
        move_uploaded_file($tmp,$photo);
    
        return $photo;
    }

    public static function afficherExperConv() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert WHERE specialite = 'Conversion Professionnelle' ");
            $stmt->execute();
            $expertCon = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $expertCon;
        } catch(PDOException $e) {
            echo "Error d'extraire experts de conversion: " . $e->getMessage();
            return false;
        }
    }

    public static function afficherExperDev() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert WHERE specialite = 'Développement Personnel' ");
            $stmt->execute();
            $expertDev = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $expertDev;
        } catch(PDOException $e) {
            echo "Error d'extraire experts de developpement personnel: " . $e->getMessage();
            return false;
        }
    }

    public static function afficherCoach() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert WHERE specialite = 'Coaching de carrière' ");
            $stmt->execute();
            $coach = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $coach;
        } catch(PDOException $e) {
            echo "Error d'extraire experts de coaching: " . $e->getMessage();
            return false;
        }
    }
}
?>
