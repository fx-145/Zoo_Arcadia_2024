<?php
//require_once __DIR__ . '/../vendor/autoload.php';
//appelle les variables déclarées dans .env
//use Dotenv\Dotenv;
//$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
//$dotenv->load();

class DatabaseMongo {
    private static $instance = null;
    private $client;
    private $database;

    private function __construct() {
       // $this->client = new MongoDB\Client("mongodb://localhost:27017");
        //$this->client = new MongoDB\Client($_ENV['DB_HOST_M']);
        $this->client = new MongoDB\Client(getenv('DB_HOST_M'));
       // $this->database = $this->client->selectDatabase('nom_de_la_base_de_donnees');
        //$this->database = $this->client->selectDatabase($_ENV['DB_NAME_M']);
        $this->database = $this->client->selectDatabase(getenv('DB_NAME_M'));
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
