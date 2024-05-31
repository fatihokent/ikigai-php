<?php
include_once "consultation.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    Consultation::deleteConsult($id);
}

if(!empty($_POST['ids'])){
    foreach ($_POST['ids'] as $id) {
        Consultation::deleteConsult($id);
    }
}

header("location:page_consultat.php");
?>