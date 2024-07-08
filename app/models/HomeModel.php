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

    // Requête  pour récupérer les habitats et une seule photo pour illustrer la page Homes, 
//triée et ensuite filtrée par home_picture_id le plus ancien
public function getHomesAndOnePicture()
{
    try {
        $query = "SELECT h.*, p.*
        FROM homes h
        INNER JOIN (
            SELECT home_id, MIN(home_picture_id) AS min_home_picture_id
            FROM home_pictures
            GROUP BY home_id
        ) AS sub
        ON h.home_id = sub.home_id
        INNER JOIN home_pictures p
        ON sub.home_id = p.home_id AND sub.min_home_picture_id = p.home_picture_id";
        $statement = $this->db->prepare($query);
       // $statement->bindParam(':email', $emailForm, PDO::PARAM_STR);
        $statement->execute();
       //c'est ça qui faisait planter le code:  $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($statement) {
         //   var_dump($statement);
            return $statement;
            

        } else {
            echo "Impossible de récupérer le role_name";
            //return null;
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return null;
    }

}

// (feuille homeDetails.php)Recenser tous les infos d'un habitat: la description, mais aussi les animaux rattachés
public function getHomeAndAnimalsDetails($home_id)
{
    
    {
         try {
            $query = "SELECT homes.*, animals.* FROM homes
            INNER JOIN animals ON homes.home_id = animals.home_id
            WHERE homes.home_id = :home_id";
            //$query = "SELECT home_name FROM homes WHERE home_id = ?";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':home_id', $home_id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //var_dump($result)['home_description'];
            if ($result) {
                return $result;
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