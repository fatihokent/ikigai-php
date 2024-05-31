<?php
require_once 'connection.php';
require_once 'user_class.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = $_POST['password']; 

    $user = new User($nom, $prenom,"", $email, $pass);
    if ($user->register()) {
        echo "Inscription réussie.";
        header("location:index.php");
        // Redirigez l'utilisateur vers une autre page si nécessaire
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
