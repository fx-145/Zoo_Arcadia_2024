<?php
//require_once '../../config/DatabaseNoSql.php';
require_once __DIR__ . '../../../config.php';
require_once DB_PATH . '/DatabaseNoSql.php';
require __DIR__.'../../../vendor/autoload.php'; //charger les dépendances de composer

use MongoDB\Client as MongoClient;
//require_once 'config/database.php';

class ViewModel {
    private $collection;

    public function __construct() {
        // Sélection de la collection 'views'
        $this->collection = DatabaseMongo::getInstance()->getDatabase()->selectCollection('views');
    }
    public function getAnimalMdb($animal_id)
    {
        try {
                        
            // Requête Mdb pour trouver l'animal par id
            $result =$this->collection->findOne(['animal_id' => $animal_id]);

            if ($result) {
                return $result['views'];
            } else {
                echo "Impossible de récupérer l'id de $animal_id";
                return null;
            }
        } catch (Exception ) {
            echo "Exception:";
            die();
        }
    }

    public function addNewAnimalAndView($animal_id,$animal_name,$race)
    {
        try {
                       
            // Requête pour insérer un nouvel animal et une vue intitialisée à 1
            $result = $this->collection->insertOne(['animal_id' => $animal_id,'animal_name' => $animal_name,'race' => $race,'views' => 1]);
            
            if ($result) {
                     echo "nouvel enregistrement de vue animal créé avec succès pour id animal". $animal_id;
            } else {
                echo "Impossible de créer un nouvel animal_vue de l'id de $animal_id";
                return null;
            }
        } catch (Exception ) {
            echo "Exception:";
            die();
        }
    }

    public function incrementView($animal_id)
    {
        try {
            // Incrémente la vue de l'animal déjà présent dans la collection 'views'de +1
            $findAnimal = ['animal_id' => $animal_id];
            $update = ['$inc' => ['views' => 1]];
            $result = $this->collection->updateOne($findAnimal, $update);
            if ($result) {
                echo " enregistrement de vue animal incrémenté avec succès pour id animal". $animal_id;
            } else {
                echo "Impossible d'incrémenter un nouvel animal_vue de l'id de $animal_id";
                return null;
            }
        } catch (Exception) {
            echo "Exception:";
            die();
        }
    }
    public function getAnimalViews()
{
    try {
        // Sélectionne la collection 'views'
        //$collection = $this->db_Mdb->views;

        // Requête pour trouver tous les animaux avec tri par nombre de vues décroissant
        $cursor = $this->collection->find([], ['sort' => ['views' => -1]]);

        // Initialiser un tableau pour stocker les résultats
        $results = [];

        foreach ($cursor as $document) {
            // Convertir le document BSON en tableau et filtrer les champs nécessaires
            $docArray = (array)$document;
            $filteredDoc = [
                'animal_name' => $docArray['animal_name'] ?? '',
                'race' => $docArray['race'] ?? '',
                'views' => $docArray['views'] ?? ''
            ];
            $results[] = $filteredDoc;
        }
return $results;

    }
     catch (Exception) {
        echo "Exception: ";
        die();
    }
}

public function resetAnimalViews() {
    try {
        //$collection = $this->db_Mdb->views;
        $this->collection->deleteMany([]);
        //$collection->deleteMany([]);
        echo "collection effacee";
    } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . "\n";
    }
}
}









    

