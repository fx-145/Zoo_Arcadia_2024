<?php

//Charger les données du fichier d'environnement sécurisé
//require_once __DIR__ . '/../vendor/autoload.php';

//$envPath = __DIR__ . '/../';
//error_log("Loading .env file from: " . $envPath);

//use Dotenv\Dotenv;
//$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
//$dotenv->load();

class Database {

    private $host;
    private $db_name;
    private $user_name;
    private $password;
    public $db;

    public function __construct() {
        $this->host = getenv('DB_HOST') ?: $_ENV['DB_HOST'];
        $this->db_name = getenv('DB_NAME') ?: $_ENV['DB_NAME'];
        $this->user_name = getenv('DB_USER') ?: $_ENV['DB_USER'];
        $this->password = getenv('DB_PASS') ?: $_ENV['DB_PASS'];

        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->user_name, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            die();
        }
    }
}
