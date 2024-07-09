<?php
require_once 'config/Database.php';
class PictureModel
{
    private $db;


    public function __construct()
    {
        //$this->db = $db;
        $database = new Database();
        $this->db = $database->db;

    }

    // Recenser toutes les photos des habitats
    public function getHomePictures($home_id)
    { {
            try {
                // $query = "SELECT * FROM homes WHERE home_id = :home_id";
                $query = "SELECT * FROM home_pictures WHERE home_id = :home_id";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':home_id', $home_id, PDO::PARAM_INT);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
                if ($statement) {
                    return $statement;
                } else {
                    echo "pas d'enregistrement";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return null;

            }
        }
    }
    public function addHomePictures($home_id, $home_picture_path)
    {
        try {

            // Préparer une requête pour la création de données dans la table "homes"
            $insertQuery = "INSERT INTO home_pictures (home_id, home_picture_path)
            VALUES (:home_id, :home_picture_path)";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->execute(array(':home_id' => $home_id, ':home_picture_path' => $home_picture_path));
           if ($stmt) {
            echo "Photo d'habitat ajoutée avec succès et chemin d'accès enregistré";
            header("Location: crud_homes");   
            exit();
        }

        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }

    public function deleteHomePicture($home_picture_id)
    {
        try {

            // Préparer une requête pour la suppression des données dans la table "home_pictures"
            $deleteQuery = "DELETE FROM home_pictures WHERE home_picture_id=?";
            $stmt = $this->db->prepare($deleteQuery);
            $stmt->execute([$home_picture_id]);
           

        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }

    // Recenser toutes les photos des animaux
    public function getAnimalPictures($animal_id)
    { {
            try {
                // $query = "SELECT * FROM homes WHERE home_id = :home_id";
                $query = "SELECT * FROM animal_pictures WHERE animal_id = :animal_id";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
                

                //var_dump($result)['home_name'];
                if ($statement) {
                   
                    return $statement;
                    
                } else {
                    echo "pas d'enregistrement";
                    //return null;
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return null;

            }
        }
    }

}