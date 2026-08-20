<?php
// A. Singleton Pattern

declare(strict_types=1);

class Database

{
    private static ?Database $instance = null;

    // Private constructor: 'new Database()' ko class ke bahar block karta hai
    private function __construct() {}

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
            echo "Databse instance created!";
        }
        return self::$instance;
    }
}

// Both variables pinting to same location

$db1 = Database::getInstance();
$db2 = Database::getInstance();

// Always True
$referenceCheck = $db1 === $db2; 

if ($referenceCheck) {
    echo "True" ;
}else{
    echo "False";
}