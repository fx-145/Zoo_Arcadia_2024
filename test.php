
<?php
echo "test";


require_once __DIR__ . '/app/controllers/router/Router.controller.php';
$controller = new Navbar();
var_dump($controller);
$uri = $controller->getCurrentUri();
var_dump($uri);
$result = $controller->router($uri);
//var_dump($result);

require_once __DIR__ . '/../vendor/autoload.php';

$envPath = __DIR__ . '/../';
error_log("Loading .env file from: " . $envPath);

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
Class Database {

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

class AnimalController
{
    private $model;

    public function __construct()
    {
        $this->model = new AnimalModel();
    }
    public function getAnimals()
    {
        return $this->model->getAnimals();
    }
}

//Pour lister les animaux: crée une instance d'AnimalController, et un appel de la méthode getAnimalRaces
$controllerA = new AnimalController();
$resultA = $controllerA->getAnimals();
var_dump($resultA);






try {
    require_once __DIR__ . '/app/controllers/router/Router.controller.php';
    if($_SERVER['REQUEST_URI'] == '/test.php') {
        $_SERVER['REQUEST_URI'] = '/';
        $controller = new Navbar();
        $uri = $controller->getCurrentUri();
        $result = $controller->router($uri);
        var_dump($result);
    }
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    //return null;
}