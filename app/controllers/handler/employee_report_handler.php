<?php
require_once '../AnimalController.php';
require_once '../UserController.php';
require_once '../EmployeeController.php';
require_once '../router/Router.controller.php';

// Créer les instances nécessaires
$controllerA = new AnimalController();
$controllerU = new UserController();
$controllerE = new EmployeeController();
$controllerN = new Navbar();
// Rechercher les noms des animaux à afficher dans le champ animaux:
// Vérification du token CSRF
require 'security_receiver.php';

// Si le formulaire est soumis, retrouver l'Id de l'animal en fonction de son nom
if (isset($_POST['animal_name']) && isset($_POST['type_of_food_given']) && isset($_POST['qty_of_food_given']) && isset($_POST['date_time'])) {
  try {
      // Récupérer l'animal_id de l'animal alimenté par l'employé
      $animal_name = $_POST['animal_name'];
      $animal_id = $controllerA->getanimalId($animal_name);

      // Démarrer la session et récupérer le user_id de l'employé
      session_start();
      if (isset($_SESSION['userName'])) {
          $userName = $_SESSION['userName'];
          $user_id = $controllerU->getUserId($userName);
      } else {
          throw new Exception("Session non démarrée ou userName non défini");
      }

      // Récupérer le reste des données du formulaire
      $type_of_food_given = $_POST['type_of_food_given'];
      $qty_of_food_given = $_POST['qty_of_food_given'];
      $date_time = $_POST['date_time'];

      // Intégrer les données dans la table 'employee_passages'
      $controllerE->EmployeePassageReport($animal_id, $user_id, $type_of_food_given, $qty_of_food_given, $date_time);
      $successReportEmployee =1;

      // Rediriger vers la page information en cas de succès
      $redirectUrl = $controllerN->urlValue('/information', ['success_report_e' => $successReportEmployee ? '1' : '0']);
      header("Location: " . $redirectUrl);
      exit();

  } catch (Exception $e) {
      // Afficher l'erreur
      echo 'Erreur : ' . $e->getMessage();
  }
} else {
  echo 'Erreur : Tous les champs du formulaire ne sont pas définis.';
}
       

 
 