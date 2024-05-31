<?php 
include_once "expert_class.php";
if(isset($_POST['mot_passe'])) {
    $mot_passe = $_POST['mot_passe'];
} else {
    $mot_passe = "123";
}
$photo = Expert::uploadimg($_FILES['photo']);
extract($_POST);
$expert = new Expert($nom_complet, $specialite, $telephone, $email, $mot_passe, $photo);
$expert->addExpert();
header("location:page_experts.php");
?>