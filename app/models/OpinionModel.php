<?php
require_once '../../config/Database.php';
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




}