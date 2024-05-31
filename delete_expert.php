<?php
include_once "expert_class.php";
include_once "admin_class.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    Admin::deleteExpert($id);
}

if(!empty($_POST['ids'])){
    foreach ($_POST['ids'] as $id) {
        Admin::deleteExpert($id);
    }
}

header("location:page_experts.php");
?>