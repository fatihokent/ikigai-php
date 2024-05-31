<?php 
include_once "admin_class.php";
include_once "expert_class.php";
extract($_POST);
if (!empty($_FILES['photo']['name'])) {
    $photo = Expert::uploadimg($_FILES['photo']);
} else {
    $photo = Admin::findexpert($id)['photo'];
}
$expert = new Expert($nom_complet, $specialite, $telephone, $email, $mot_passe, $photo);
$expert = Admin::updateExpert($id, $nom_complet, $specialite, $telephone, $email, $mot_passe, $photo);
header("location:page_experts.php");

?>