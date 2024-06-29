<?php
//include '../Model/HomeModel.php';
//require_once '../OpinionController.php';
require_once 'app/controllers/OpinionController.php';
//require_once '../../config/Database.php';
require_once 'config/Database.php';
//var_dump($_GET['id']);
//if ($_SERVER["REQUEST_METHOD"] == "POST") 
// Vérification si le formulaire a été soumis
if (isset($_GET['s_id'])&& isset($_GET['id'])) {
    // Récupération des données 
    $opinion_id= $_GET['id'];
    $status= $_GET['s_id'];
// si s_id=0, le statut devient ko. Si s_id=1, le statut devient ok.
    if ($status == "0") {
        $newOpinionStatus = 'ko';
    } else if ($status == "1") {
        $newOpinionStatus = 'ok';
    }
  
   ;
   var_dump($opinion_id);

   //var_dump($newOpinionStatus);
   // Création d'une instance du modèle OpinionModel
    $controller = new OpinionController();
    
   $controller->updateOpinionStatus($opinion_id, $newOpinionStatus);

     // Redirection vers la page de validation des avis en attente
   header("Location: area_employee_v_opinions.php");
    
   
    
    // Redirection vers la page de validation des avis en attente
  // header("Location: index.php");
    //exit();
}