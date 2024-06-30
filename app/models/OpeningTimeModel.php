<?php
require_once 'config/Database.php';
//$dbconnection = Database::getConnection();
class OpeningTimeModel
{
    private $db;
    

    public function __construct()
    {
        //$this->db = $db;
        $database = new Database();
        $this->db = $database->db;

    }

    public function getOpeningHours()
    {
       
        {
             try {
               // $query = "SELECT * FROM homes WHERE home_id = :home_id";
                $query = "SELECT * FROM opening_hours";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
                //var_dump($statement);
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
}
