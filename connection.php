<?php
class Connect{
private static $instance = null;
public static function connection() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=soutenance", "root", "root");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (\Throwable $th) {
        echo "Erreur connection ". $th->getMessage();
    }
}

public static function getInstance() {
    if(!self::$instance) {
        self::$instance = new Connect();
    }
    return self::$instance;
}



}