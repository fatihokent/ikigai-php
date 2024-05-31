<?php
include_once "connection.php";

class Admin {
    public $id_admin;
    public $nom_utilisateur;
    public $mot_de_passe;

    public function __construct($nom_utilisateur, $mot_de_passe) {
        $this->nom_utilisateur = $nom_utilisateur;
        $this->mot_de_passe = $mot_de_passe;
    }

    public static function login($nom_utilisateur, $mot_de_passe) {
        try {
            $conn = Connect::getInstance()->Connection();
            $stmt = $conn->prepare("SELECT * FROM admin WHERE nom_utilisateur = ? AND mot_de_passe = ?");
            $stmt->execute([$nom_utilisateur, $mot_de_passe]);
            $user = $stmt->fetch();
            if($user) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Error login admin: " . $e->getMessage();
            return false;
        }
    }

    public static function updateExpert($idExpert, $nomComplet, $specialite, $telephone, $email, $motPasse, $photo) {
        try {
            $conn = Connect::getInstance()->connection();
            $sql = "UPDATE expert SET nom_complet=?, specialite=?, telephone=?, email=?, mot_passe=?, photo=? WHERE id_expert=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nomComplet, $specialite, $telephone, $email, $motPasse, $photo, $idExpert]);
            return true;
        } catch(PDOException $e) {
            echo "Erreur modification expert: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteExpert($idExpert) {
        try {
            $conn = Connect::getInstance()->connection();
            $sql = "DELETE FROM expert WHERE id_expert=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idExpert]);
            return true;
        } catch(PDOException $e) {
            echo "Erreur de suppression d'expert: " . $e->getMessage();
            return false;
        }
    }

    public static function findexpert($id_expert) {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert where id_expert= ?");
            $stmt->execute([$id_expert]);
            $experts = $stmt->fetch(PDO::FETCH_ASSOC);
            return $experts;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getReservationCount() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT COUNT(*) AS reservation_count FROM consultation");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['reservation_count'];
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getReservations() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM consultation");
            $stmt->execute();
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reservations;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getExpertCount() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT COUNT(*) AS expert_count FROM expert");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['expert_count'];
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function listExpert() {
        try {
            $conn = Connect::getInstance()->connection();
            $stmt = $conn->prepare("SELECT * FROM expert");
            $stmt->execute();
            $experts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $experts;
        } catch(PDOException $e) {
            echo "Error de liste d'experts: " . $e->getMessage();
            return false;
        }
    }
}
?>
