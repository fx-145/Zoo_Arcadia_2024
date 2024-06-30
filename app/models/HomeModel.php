<?php
require_once 'config/Database.php';
class HomeModel
{
    private $db;
    public function __construct()
    {
        //$this->db = $db;
        $database = new Database();
        $this->db = $database->db;
    }
    // Recenser tous les habitats
    public function getHomes()
    { {
            try {
                // $query = "SELECT * FROM homes WHERE home_id = :home_id";
                $query = "SELECT * FROM homes";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
                //var_dump($statement);
                if ($statement) {
                    return $statement;
                } else {
                    echo "pas d'enregistrement";
                }
                //return null;

            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return null;
            }
        }
    }
}