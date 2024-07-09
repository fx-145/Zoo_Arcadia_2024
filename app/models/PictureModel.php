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