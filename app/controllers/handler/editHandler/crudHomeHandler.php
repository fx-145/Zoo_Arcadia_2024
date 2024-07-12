<?php
require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/HomeController.php';
class HomeHandler
{
    private $controller;
    public function __construct()
    {
        $this->controller = new HomeController();
    }

    public function handleUpdateHome()
    {
        $newHomeName = $_POST['newhome_name'];
        $newHomeDescription = $_POST['newhome_description'];
        $home_id = $_POST['home_id'];
        $this->controller->updateHome($home_id, $newHomeName, $newHomeDescription);
        header("Location: /crud_homes");
        exit(); // Afin que le script se termine

    }
    public function handleAddHome()
    {
        $home_name = $_POST['home_name'];
        $home_description = $_POST['home_description'];
        $this->controller->addHome($home_name, $home_description);
        header("Location: /crud_homes");
        exit(); // Afin que le script se termine
    }
    public function handleDeleteHome()
    {
        // supprime l'enregistrement de l'habitat'
        $home_id = $_POST['home_id'];
        $this->controller->deleteHome($home_id);
        header("Location: /crud_homes");
        exit(); // Afin que le script se termine
    }
}

// Vérification du token CSRF
require 'app/controllers/handler/security_receiver.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formHandler = new HomeHandler();

    if (isset($_POST['submit_add_home'])) {
        $formHandler->handleAddHome();

    }

    if (isset($_POST['submit_update_home'])) {
        $formHandler->handleUpdateHome();

    }

    if (isset($_POST['submit_delete_home'])) {
        $formHandler->handleDeleteHome();
    }

}