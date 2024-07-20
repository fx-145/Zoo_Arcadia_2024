<?php
require_once __DIR__ . '/../vendor/autoload.php';

class DatabaseMongo {
    private static $instance = null;
    private $client;
    private $database;

    private function __construct() {
        // Utiliser getenv pour récupérer l'URI de MongoDB
        $uri = getenv('MONGODB_URI');
        if ($uri === false) {
            throw new Exception('La variable d\'environnement MONGODB_URI doit être définie.');
        }

        // Créer une connexion au client MongoDB
        $this->client = new MongoDB\Client($uri);

        // Sélectionner la base de données
        $dbName = getenv('DB_NAME_M');
        if ($dbName === false) {
            throw new Exception('La variable d\'environnement DB_NAME_M doit être définie.');
        }
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
