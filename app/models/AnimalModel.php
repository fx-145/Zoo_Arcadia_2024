<?php
require_once __DIR__ . '../../../config.php';
require_once DB_PATH . '/Database.php';
class AnimalModel
{
    private $db;
    //appel de la base de donnée stockée dans le fichier Database, et dans la classe Database.
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
    public function getAnimalsAndOnePicture($home_id)
    {
        try {
            $query = "SELECT a.animal_id, a.animal_name, p.animal_picture_path
            FROM animals a
            INNER JOIN (
                SELECT animal_id, MIN(animal_picture_id) AS min_animal_picture_id
                FROM animal_pictures
                GROUP BY animal_id
            ) AS sub
            ON a.animal_id = sub.animal_id
            INNER JOIN animal_pictures p
            ON sub.animal_id = p.animal_id AND sub.min_animal_picture_id = p.animal_picture_id
            WHERE a.home_id = :home_id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':home_id', $home_id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Vérifiez si des résultats ont été récupérés
            if ($result) {
                return $result;
            } else {
                echo "Impossible de récupérer les enregistrements";
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    //Affiche le nom des animaux dans le champ de sélection (Vetform et employeeForm)
    public function scrollBarAnimalName()
    {
        try {
            $query = "SELECT animal_name FROM animals ORDER BY animal_name ASC";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
            if ($statement) {
                return $statement;
            } else {
                echo "Impossible de récupérer les noms des animaux";
                //return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;


        }
    }
    public function getAnimalId($animal_name)
    {
        try {
            $query = "SELECT animal_id FROM animals WHERE animal_name = :animal_name";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':animal_name', $animal_name, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['animal_id'];
            } else {
                echo "Impossible de récupérer l'id de $animal_name";
                //return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;


        }
    }

    public function getAnimalHomeId($animal_name)
    {
        try {
            $query = "SELECT home_id FROM animals WHERE animal_name = :animal_name";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':animal_name', $animal_name, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['home_id'];
            } else {
                echo "Impossible de récupérer l'home_id de $animal_name";
                //return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;


        }
    }
}