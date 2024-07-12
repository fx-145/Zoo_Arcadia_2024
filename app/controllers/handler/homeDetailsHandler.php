<?php
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/AnimalController.php';
session_start();

if (isset($_POST['home_id'])) {
    // Récupérer les photos de l'habitat sélectionné, sa description,
    // les animaux qui y sont rattachés.
    $_SESSION['home_id'] = $_POST['home_id'];
    $home_id = $_POST['home_id'];
    $controller = new HomeController();
    $result = $controller->getHomeAndAnimalsDetails($home_id);

    //Récupérer une photo par animal de l'habitat sélectionné
    $controller2 = new AnimalController();
    $result_pictures = $controller2->getAnimalsAndOnePicture($home_id);
}
