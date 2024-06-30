<?php
require_once 'config/Database.php';
class ServiceModel
{
    private $db;


    public function __construct()
    {
        $database = new Database();
        $this->db = $database->db;

    }

    public function getServices()
    { {
            try {
                $query = "SELECT * FROM services";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
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
}