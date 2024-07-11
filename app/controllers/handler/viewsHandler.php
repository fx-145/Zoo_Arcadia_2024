<?php
require_once 'app/controllers/AnimalController.php';
require_once 'app/controllers//ViewController.php';

if (isset($_POST['animal_id'])) {
    
    $animal_id = $_POST['animal_id'];

   
// Vérifier si l'animal est déjà présent ou non dans la collection 'views'
$controller = new ViewController();
$result_view= $controller->getAnimalMdb($animal_id);
//démarrer une session pour transférer $animal_id qui sera nécessaire pour être affiché dans animal_details
session_start();
$_SESSION['animal_id'] = $animal_id;

// Si l'animal n'a pas déjà été cliqué, on crée un nouvel enregistrement de vue en initialisant à 1 la vue
if(!$result_view){
$controller2= new AnimalController();
$result2= $controller2->getAnimalsWithId($animal_id);
$animal_name=$result2['animal_name'];
$race = $result2['race'];

 $controller = new ViewController();
 $controller->addNewAnimalAndView($animal_id, $animal_name,$race);
 // ensuite redirection vers la page "animal_details"
 header("Location: animal_details");
 exit; // fin du script
}
else{
    // Si l'animal est déjà présent dans la collection des vues, on incrémente la vue
$controller = new ViewController();
$controller->incrementView($animal_id);
// ensuite redirection vers la page "animal_details"
header("Location: animal_details");
exit; // fin du script
};

}