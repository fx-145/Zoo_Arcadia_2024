<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Charger les variables d'environnement depuis le fichier .env si présent
$envPath = __DIR__ . '/../';
if (file_exists($envPath . '.env')) {
    $dotenv = Dotenv::createImmutable($envPath);
    $dotenv->load();
} else {
    error_log('Warning: .env file not found');
}

class Database {

    private $host;
    private $db_name;
    private $user_name;
    private $password;
    public $db;

    public function __construct() {
        // Utiliser getenv() pour obtenir les variables d'environnement
        $this->host = getenv('DB_HOST');
        $this->db_name = getenv('DB_NAME');
        $this->user_name = getenv('DB_USER');
        $this->password = getenv('DB_PASS');

        // Vérifiez que toutes les variables d'environnement nécessaires sont définies
        if (!$this->host || !$this->db_name || !$this->user_name || !$this->password) {
            error_log("Erreur : une ou plusieurs variables d'environnement de la base de données sont manquantes.");
            die("Configuration de la base de données incorrecte.");
        }

        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->user_name, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            die();
        }
    }
}

// Exemple d'utilisation de la classe Database
$db = new Database();
