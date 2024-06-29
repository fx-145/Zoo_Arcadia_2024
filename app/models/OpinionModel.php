<?php
//require_once '../../config/Database.php';
require_once 'config/Database.php';
//$dbconnection = Database::getConnection();
class OpinionModel
{
    private $db;
    

    public function __construct()
    {
        
        $database = new Database();
        $this->db = $database->db;

    }

    public function SendVisitorOpinion ($pseudo, $opinion)
    {
        // Insérer l'avis' dans table visitor_opinions
        try {
            $insertQuery = "INSERT INTO visitor_opinions (pseudo, opinion) 
    VALUES (:pseudo, :opinion)";

    $stmt = $this->db->prepare($insertQuery);

    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':opinion', $opinion);
    $stmt->execute();

            echo "Avis de  $pseudo enregistrées";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }

    public function showPendingVisitorOpinions ()
    {
        // Afficher les avis visiteurs en attente de validation
        try {
             $query = "SELECT * FROM visitor_opinions WHERE status='pending'";
             $statement = $this->db->prepare($query);
             $statement->execute();
             $result= $statement->fetchAll(PDO::FETCH_ASSOC);
             //var_dump($statement);
             if ($result) {
                 return $result;
             } else {
                 echo "pas d'enregistrement";}
                 //return null;
             
         } catch (PDOException $e) {
             echo "Erreur : " . $e->getMessage();
             return null;


         }
    }

    public function updateOpinionStatus ($opinion_id, $newOpinionStatus)
    {
        // 5. Insérer les données dans la base : dans la table users
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


}