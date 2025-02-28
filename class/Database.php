<?php

class Database {
    private static ?Database $instance = null;

    private PDO $pdo;

    private function __construct() {
        $host = "localhost";
        $dbname = "produits";
        $user = "root";
        $pass = "";

        try {
         $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $pass);
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public static function getInstance (): ?Database {
        if(self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
