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
    public function getServiceWithId($service_id)
    {
        // Recenser tous les habitats
        {
             try {
                $query = "SELECT * FROM services WHERE service_id = :service_id";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':service_id', $service_id, PDO::PARAM_INT);
                $statement->execute();
                $result=$statement->fetch(PDO::FETCH_ASSOC);
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
    public function addService($service_name, $service_description)
    {
        try {

            // Préparer une requête pour la création de données dans la table "services"
            $insertQuery = "INSERT INTO services (service_name, service_description)
            VALUES (:service_name, :service_description)";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->execute(array(':service_name' => $service_name, ':service_description' => $service_description));
           
           if ($stmt) {
            echo "Service ajouté avec succès";





        }

            echo "Nouveau service enregistré";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
    public function updateService($service_id,$new_service_name, $new_service_description)
    {
        
        try {

            // Préparer une requête pour la mise à jour des données dans la table "services"
            $insertQuery = "UPDATE services SET service_name= :service_name, service_description=:service_description WHERE service_id=:service_id";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->bindParam(':service_name', $new_service_name, PDO::PARAM_STR);
            $stmt->bindParam(':service_description', $new_service_description, PDO::PARAM_STR);
            $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
            $stmt->execute();
            // Redirection vers la page principale
            header("Location: crud_services");
            exit; // Fin du script
                       
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }}

//supprimer un habitat et ses données
    public function deleteService($service_id)
    {
        try {

            // Préparer une requête pour la suppression des données dans la table "services"
            $deleteQuery = "DELETE FROM services WHERE service_id=:service_id";
            $stmt = $this->db->prepare($deleteQuery);
            $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt) {
                echo "Habitat supprimé avec succès";

            }


        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
}