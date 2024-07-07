<?php
require_once 'app/controllers/AnimalController.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/EmployeeController.php';
// Créer les instances nécessaires
//use UserController\UserController;
$controllerA = new AnimalController();
$controllerU = new UserController();
$controllerE = new EmployeeController();

// Rechercher les noms des animaux à afficher dans le champ animaux:
$data = $controllerA->scrollBarAnimalName();
//var_dump($_SESSION['userName']);
// Si le formulaire est soumis, retrouver l'Id de l'animal en fonction de son nom
if (isset($_POST['animal_name']) && isset($_POST['type_of_food_given']) && isset($_POST['qty_of_food_given']) && isset($_POST['date_time'])) {
  $animal_name = $_POST['animal_name'];
  //récupérer l'animal_id de l'animal alimenté par l'employé
  $animal_id = $controllerA->getanimalId($animal_name);
 
//récupérer le user_id de l'employé
  $userName = $_SESSION['userName'];
  $user_id = $controllerU->getUserId($userName);
//récupérer le reste des données du formulaire
  $type_of_food_given = $_POST['type_of_food_given'];
  $qty_of_food_given = $_POST['qty_of_food_given'];
  $date_time = $_POST['date_time'];
//Une fois toutes les données récupérées, j'intègre les données dans la table 'employee_passages'
$controllerE ->EmployeePassageReport($animal_id, $user_id,$type_of_food_given, $qty_of_food_given, $date_time);


}



// Si le formulaire est soumis, retrouver l'Id du user en fonction de son nom
//if (isset($_POST['user_name'])) {
 
 // $emailForm = 'joe2@mail.fr';
 //session_start();
  
 // var_dump($emailForm);

// Créer une instance du contrôleur pour l'insertion de toutes les données du formulaire, suite au passage de l'employé

// Si le formulaire est soumis, intégrer les données de passage du vétérinaire

