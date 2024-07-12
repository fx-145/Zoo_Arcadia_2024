<?php
//encapsulation du code de traitement  dans une classe et une fonction
require_once 'config.php';
require_once APP_CONTROLLER_PATH. '/ServiceController.php';

class ServiceHandler
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ServiceController();
    }
    public function handleAddService()
    {
        $service_name = $_POST['service_name'];
        $service_description = $_POST['service_description'];
        $this->controller->addService($service_name, $service_description);
         // Redirection vers la page de modifs
         header("Location: crud_services");
         exit; // fin du script
    }
    public function handleUpdateService()
    {
        $service_id = $_POST['service_id'];
        $new_service_name = $_POST['new_service_name'];
        $new_service_description = $_POST['new_service_description'];
        $this->controller->updateService($service_id, $new_service_name, $new_service_description);
          // Redirection vers la page de modifs
          header("Location: crud_services");
          exit; // fin du script

    }

    public function handleDeleteservice()
    {
        $service_id = $_POST['service_id'];
        $this->controller->deleteService($service_id);
        header("Location: crud_services");
        exit(); // Fin du script
    }
}

// Vérification du token CSRF
require 'app/controllers/handler/security_receiver.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formHandler = new ServiceHandler();

    if (isset($_POST['submit_add_service'])) {
        $formHandler->handleAddService();
      
    } 

    if (isset($_POST['submit_update_service'])) {
        $formHandler->handleUpdateService();
      
    } 

    if (isset($_POST['submit_delete_service'])) {
        $formHandler->handleDeleteService();
    }

}