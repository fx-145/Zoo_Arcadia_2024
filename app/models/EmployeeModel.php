<?php
//-- require_once 'config/Database.php';
require_once '../../../config.php';
require_once DB_PATH . '/Database.php';
//require_once '../../../config/Database.php';
class EmployeeModel
{
    private $db;

    public function __construct()
    {
        //$this->db = $db;
        $database = new Database();
        $this->db = $database->db;

    }


    //fonction de recherche de l'animal_id en fonction de son animal_name
    public function EmployeePassageReport($animal_id, $user_id,$type_of_food_given, $qty_of_food_given, $date_time)
    {
        try {

            //$pdo = new PDO($dsn, $username, $passwd);
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$dbconnection = Database::getConnection();
        
            
        
            // Préparer une requête pour l'insertion des données dans la table "employee_passages"
            $insertQuery = "INSERT INTO employee_passages (given_type_of_food, given_food_weight, employee_passage_date_time, user_id, animal_id) 
            VALUES (:given_type_of_food, :given_food_weight, :employee_passage_date_time, :user_id,:animal_id)";
        
            //$stmt = $pdo->prepare($insertQuery);
            $stmt =$this->db->prepare($insertQuery);
        
            $stmt->bindParam(':given_type_of_food', $type_of_food_given);
            $stmt->bindParam(':given_food_weight', $qty_of_food_given);
            $stmt->bindParam(':employee_passage_date_time', $date_time);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':animal_id', $animal_id);
            $stmt->execute();
        
        
            echo "Données de passage vétérinaire sur l'animal $animal_id enregistrées";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
}