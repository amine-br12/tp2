<?php

class Connection {

    private static $Bd;

    private function __construct() {
        try {

            // Connect to SQLite database file
            self::$Bd = new PDO('sqlite:' . __DIR__ . '/SchoolV1.db'); 
            self::$Bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            die();
        }
    }

    public static function GetInstance() {
        if (!self::$Bd) {
            new Connection();
        }
        return self::$Bd;
    }
}

$Bd = Connection::GetInstance();

?>
