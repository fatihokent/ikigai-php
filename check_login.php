<?php
session_start();
include_once "admin_class.php";
include_once "user_class.php";

if(isset($_POST["name"]) && isset($_POST["pass"])){
    extract($_POST);
    if (Admin::login($name,$pass)) {
        $_SESSION['user']=$name;
        $_SESSION['pass']=$pass;
        header( 'Location: dashboard.php' ) ;
        exit;
    } elseif (User::login($name, $pass)) {
        $_SESSION['user']=$name;
        $_SESSION['pass']=$pass;
        header("location:index.php");
        exit;
    }
}else{
    echo "<div class='msg-danger'>Invalid Login!!!</div>";
}
