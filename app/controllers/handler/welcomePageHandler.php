<?php
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/AnimalController.php';
require_once 'app/controllers/ServiceController.php';
require_once 'app/controllers/OpinionController.php';


//Pour lister les animaux: crée une instance d'AnimalController, et un appel de la méthode getAnimalRaces
$controllerA = new AnimalController();
$resultA = $controllerA->getAnimals();

// Pour lister les habitats: crée une instance d'HomeController, et un appel de la méthode getHomes
$controllerH = new HomeController();
$resultH = $controllerH->getHomes();


//Pour lister les services: crée une instance de ServiceController, et un appel de la méthode getServices
$controllerS = new ServiceController();
$resultS = $controllerS->getServices();

// Pour lister les avis: crée une instance d'OpinionController, et un appel de la méthode getValidatedOpinions
$controllerO = new OpinionController();
$resultO = $controllerO->getValidatedOpinions();
