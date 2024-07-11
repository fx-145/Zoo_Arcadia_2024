<?php
require_once 'config/Database.php';
class OpeningTimeModel
{
    private $db;
    

    public function __construct()
    {
        
        $database = new Database();
        $this->db = $database->db;
        

    }

    public function getOpeningHours()
    {
       
        {
             try {
                $query = "SELECT * FROM opening_hours";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
                if ($statement) {
                    return $statement;
                } else {
                    echo "pas d'enregistrement";}
                    //return null;
                
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return null;
            }

        }
    }

public function getOpeningHoursWithId($op_hours_id)
    {
        {
             try {
                $query = "SELECT * FROM opening_hours WHERE id = :op_hours_id";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':op_hours_id', $op_hours_id, PDO::PARAM_INT);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
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

    public function updateOpeningHours($op_hours_id,$new_opening_time, $new_closing_time)
    {
        
        try {

            // Préparer une requête pour la mise à jour des données dans la table "opening_hours"
            $insertQuery = "UPDATE opening_hours SET opening_time= :opening_time, closing_time=:closing_time WHERE id=:op_id";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->bindParam(':opening_time', $new_opening_time, PDO::PARAM_STR);
            $stmt->bindParam(':closing_time', $new_closing_time, PDO::PARAM_STR);
            $stmt->bindParam(':op_id', $op_hours_id, PDO::PARAM_INT);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }}
}
