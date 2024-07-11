<?php

require_once __DIR__. '/../../config.php';
require_once DB_PATH . '/Database.php';

class VetModel
{
    private $db;

    public function __construct()
    {
        
        $database = new Database();
        $this->db = $database->db;
        

    }


    //fonction pour alimenter les rapports vétérinaires
    public function addVetPassageReport($animal_id, $user_id, $type_of_food_proposed, $qty_of_food_proposed, $date, $animal_condition, $animal_condition_detail, $home_condition, $home_id)
    {
        try {

            $insertQuery = "INSERT INTO vet_passages (type_of_food_proposal, food_weight_proposal, vet_passage_date, animal_condition, animal_condition_detail, user_id, animal_id,home_condition,home_id) 
        VALUES (:type_of_food_proposed, :qty_of_food_proposed, :vet_passage_date, :animal_condition, :animal_condition_detail, :user_id,:animal_id,:home_condition,:home_id)";

            //$stmt = $pdo->prepare($insertQuery);
            $stmt = $this->db->prepare($insertQuery);

            $stmt->bindParam(':type_of_food_proposed', $type_of_food_proposed);
            $stmt->bindParam(':qty_of_food_proposed', $qty_of_food_proposed);
            $stmt->bindParam(':vet_passage_date', $date);


            $stmt->bindParam(':animal_condition', $animal_condition);
            $stmt->bindParam(':animal_condition_detail', $animal_condition_detail);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':animal_id', $animal_id);
            $stmt->bindParam(':home_condition', $home_condition);
            $stmt->bindParam(':home_id', $home_id);
            $stmt->execute();


            echo "Données de passage vétérinaire sur l'animal $animal_id enregistrées";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }


    public function getVetReports()
    { {
            try {

                $query = "SELECT * FROM vet_passages
                INNER JOIN users ON vet_passages.user_id = users.user_id
                INNER JOIN animals ON vet_passages.animal_id = animals.animal_id";
                ;
                $statement = $this->db->prepare($query);
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
}