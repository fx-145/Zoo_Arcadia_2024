<?php
//encapsulation du code de traitement  dans une classe et une fonction, dans le fichier Edithandler.php
require_once 'config.php';
require_once APP_CONTROLLER_PATH. '/AnimalController.php';

//require_once 'app/controllers/HomeController.php';
class AnimalHandler
{
    private $controller;

    public function __construct()
    {
        $this->controller = new AnimalController();
    }
    //fonction d'envoi de mail de contact pour un visiteur avec pseudo
    public function handleAddAnimal()
    {
        //Récupère les habitats à afficher dans la barre déroulante de sélection

        $animal_name = $_POST['animal_name'];
        $animal_race = $_POST['animal_race'];
        $home_id = $_POST['new_home_id'];
        $this->controller->addAnimal($animal_name, $animal_race, $home_id);
         // Redirection vers la page de modifs
         header("Location: crud_animals");
         exit; // fin du script
    }

    public function handleUpdateAnimal()
    {
        //Récupère les habitats à afficher dans la barre déroulante de sélection
        $animal_id = $_POST['animal_id'];
        $new_animal_name = $_POST['new_animal_name'];
        $new_animal_race = $_POST['new_animal_race'];
        $new_home_id = $_POST['new_home_id'];
        $this->controller->updateAnimal($animal_id, $new_animal_name, $new_animal_race, $new_home_id);
        // Redirection vers la page de modifs
        header("Location: crud_animals");
        exit; // fin du script        

    }
    public function handleDeleteAnimal()
    {
        // supprime l'enregistrement de l'animal
        $animal_id = $_POST['animal_id'];
        $this->controller->deleteAnimal($animal_id);
        // Redirection vers la page de modifs
        header("Location: crud_animals");
        exit; // fin du script 
    }
}

//encapsulation du code de traitement de l'édition de la fiche animal dans une classe et une fonction, dans le fichier Edithandler.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formHandler = new AnimalHandler();

    if (isset($_POST['submit_add_animal'])) {
        $formHandler->handleAddAnimal();
      
    } 

    if (isset($_POST['submit_update_animal'])) {
        $formHandler->handleUpdateAnimal();
      
    } 

    if (isset($_POST['submit_delete_animal'])) {
        $formHandler->handleDeleteAnimal();
    }

}