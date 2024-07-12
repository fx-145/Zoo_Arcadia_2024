<?php
require_once 'config/Database.php';
class OpinionModel
{
    private $db;
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->db;
    }
    public function SendVisitorOpinion($pseudo, $opinion)
    {
        // Insérer l'avis' dans la table visitor_opinions
        try {
            $insertQuery = "INSERT INTO visitor_opinions (pseudo, opinion) 
    VALUES (:pseudo, :opinion)";

            $statement = $this->db->prepare($insertQuery);
            $statement->bindParam(':pseudo', $pseudo);
            $statement->bindParam(':opinion', $opinion);
            $statement->execute();
            echo "Avis de $pseudo enregistrées";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
    public function showPendingVisitorOpinions()
    {
        // Afficher les avis visiteurs en attente de validation
        try {
            $query = "SELECT * FROM visitor_opinions WHERE status='pending'";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                echo "pas d'enregistrement";
            }
            //return null;

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    public function updateOpinionStatus($opinion_id, $newOpinionStatus)
    {
        // Mettra à jour le statut dans la table visitor_opinions
        try {
            $updateQuery = "UPDATE visitor_opinions SET status= :opinion WHERE opinion_id= :opinion_id";
            $statement = $this->db->prepare($updateQuery);
            $statement->bindParam(':opinion_id', $opinion_id);
            $statement->bindParam(':opinion', $newOpinionStatus);
            $statement->execute();
            echo "Avis de  $opinion_id enregistrées";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
    public function getValidatedOpinions()
    {
        // Afficher les avis visiteurs en attente de validation
        try {
            $query = "SELECT * FROM visitor_opinions WHERE status='ok'";
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