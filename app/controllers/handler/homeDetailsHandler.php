<?php
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/AnimalController.php';


if (isset($_GET['home_id'])) {
    // Récupérer les photos de l'habitat sélectionné, sa description,
    // les animaux qui y sont rattachés.
    $home_id = $_GET['home_id'];
    $controller = new HomeController();
    $result = $controller->getHomeAndAnimalsDetails($home_id);

    //Récupérer une photo par animal de l'habitat sélectionné
    $controller2 = new AnimalController();
    $result_pictures = $controller2->getAnimalsAndOnePicture($home_id);
}
