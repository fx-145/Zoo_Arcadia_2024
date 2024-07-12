<?php
require_once '../AnimalController.php';
require_once '../UserController.php';
require_once '../VetController.php';
require_once '../router/Router.controller.php';


// Créer les instances nécessaires
$controllerA = new AnimalController();
$controllerU = new UserController();
$controllerV = new VetController();
$controllerN = new Navbar();

session_start();
$userName = $_SESSION['userName'];
$role = $_SESSION['role'];

// Si le formulaire est soumis, retrouver l'Id de l'animal en fonction de son nom
if (isset($_POST['animal_name']) && isset($_POST['type_of_food_proposed']) && isset($_POST['qty_of_food_proposed']) && isset($_POST['date']) && isset($_POST['animal_condition']) && isset($_POST['animal_condition_detail']) && isset($_POST['home_condition'])) {

  try {
    $animal_name = $_POST['animal_name'];
    $animal_id = $controllerA->getanimalId($animal_name);
    $home_id = $controllerA->getanimalHomeId($animal_name);
    $type_of_food_proposed = $_POST['type_of_food_proposed'];
    $qty_of_food_proposed = $_POST['qty_of_food_proposed'];
    $date = $_POST['date'];
    $animal_condition = $_POST['animal_condition'];
    $animal_condition_detail = $_POST['animal_condition_detail'];
    $home_condition = $_POST['home_condition'];
    $user_id = $controllerU->getUserId($userName);
    $controllerV->addVetPassageReport($animal_id, $user_id, $type_of_food_proposed, $qty_of_food_proposed, $date, $animal_condition, $animal_condition_detail, $home_condition, $home_id);
    $successReportVet = 1;
    // Rediriger vers la page information 
    $redirectUrl = $controllerN->urlValue('/information', ['success_report_v' => $successReportVet ? '1' : '0']);
    header("Location: " . $redirectUrl);
    exit();

  } catch (Exception $e) {
    // Afficher l'erreur
    echo 'Erreur : ' . $e->getMessage();
  }
}


