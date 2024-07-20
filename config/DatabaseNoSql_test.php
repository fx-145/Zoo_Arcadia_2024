<?php
use MongoDB\Client;

class DatabaseMongo {
    private static $instance = null;
    private $client;
    private $database;

    private function __construct() {
        // Utiliser les variables d'environnement
        $dbHost = getenv('DB_HOST_M');
        $dbName = getenv('DB_NAME_M');
        
        $this->client = new Client($dbHost);
        $this->database = $this->client->selectDatabase($dbName);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseMongo();
        }
        return self::$instance;
    }

    public function getDatabase() {
        return $this->database;
    }
}