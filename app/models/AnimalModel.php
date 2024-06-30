<?php
require_once 'config/Database.php';

class AnimalModel
{
    private $db;
    //appel de la base de donnée stockée dans le fichier Database, et dans une classe Database.
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->db;

    }
    public function getAnimals()
    {
        try {
            $query = "SELECT DISTINCT race FROM animals ORDER BY home_id";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($statement) {
                return $statement;
            } else {
                echo "Pas d'enregistrement";
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;


        }
    }
}