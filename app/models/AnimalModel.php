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
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    public function getAllAnimalWithHomes()
    {
        try {
            $query = "SELECT *
            FROM animals
            INNER JOIN homes ON animals.home_id = homes.home_id";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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

    //crud update animals
    public function getAnimalsWithId($animal_id)
    {
        // Afficher l'animal sélectionné pour mise à jour, avec affichage de l'habitat
        {
            try {
                $query = "SELECT * FROM animals 
                INNER JOIN homes ON animals.home_id = homes.home_id
                WHERE animal_id = :animal_id";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return $result;
                } else {
                    echo "pas d'enregistrement";
                }

            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return null;
            }
        }
    }
    // mettre à jour les données de l'animal sélectionné
    public function updateAnimal($animal_id, $new_animal_name, $new_animal_race, $new_home_id)
    {
        try {
            // Préparer une requête pour la mise à jour des données dans la table "animals"
            $insertQuery = "UPDATE animals SET animal_name= :animal_name, race=:animal_race, home_id = :home_id WHERE animal_id=:animal_id";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->bindParam(':animal_name', $new_animal_name, PDO::PARAM_STR);
            $stmt->bindParam(':animal_race', $new_animal_race, PDO::PARAM_STR);
            $stmt->bindParam(':home_id', $new_home_id, PDO::PARAM_INT);
            $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
    public function addAnimal($animal_name, $animal_race, $home_id)
    {
        try {
            // Préparer une requête pour la création de données dans la table "animals"
            $insertQuery = "INSERT INTO animals (animal_name, race, home_id)
                VALUES (:animal_name, :animal_race, :home_id)";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->bindParam(':animal_name', $animal_name, PDO::PARAM_STR);
            $stmt->bindParam(':animal_race', $animal_race, PDO::PARAM_STR);
            $stmt->bindParam(':home_id', $home_id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt) {
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
    public function deleteAnimal($animal_id)
    {
        try {
            // Préparer une requête pour la suppression des données dans la table "animals"
            $deleteQuery = "DELETE FROM animals WHERE animal_id=:animal_id";
            $stmt = $this->db->prepare($deleteQuery);
            $stmt->bindParam(':service_id', $animal_id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt) {
                echo "Fiche animal supprimée avec succès";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression des données : " . $e->getMessage();
        }
    }
    public function getOneAnimalAndAllPictures($animal_id)
    {
        try {
            $query = "SELECT animals.*, animal_pictures.*
                      FROM animals
                      INNER JOIN animal_pictures 
                      ON animals.animal_id = animal_pictures.animal_id
                      WHERE animals.animal_id = :animal_id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    public function getAnimalCondition($animal_id)
    {
        try {
            $query = "SELECT *
          FROM vet_passages
          WHERE animal_id = :animal_id
          ORDER BY vet_passage_id DESC
          LIMIT 1;";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
            $result = $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
}