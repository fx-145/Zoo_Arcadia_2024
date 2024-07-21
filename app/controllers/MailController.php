<?php
require_once __DIR__ . '../../../config.php';
require_once APP_MODEL_PATH . '/MailModel.php';
//require_once __DIR__ . '../handler/MailHandler.php';
require_once __DIR__ . '/../handler/MailHandler.php';


class MailController
{
    private $model;

    public function __construct()
    {
        $this->model = new MailModel();
    }

    public function sendContactMail($titre, $description, $emailContact, $emailRecipient)
    {
        // Appelle la méthode du modèle pour envoyer le mail
        return $this->model->sendMail($titre, $description, $emailContact, $emailRecipient);
    }
}

class MailHandler
{
    private $controller;

    public function __construct()
    {
        $this->controller = new MailController();
    }


    public function handleForm1($postData)
    {
        // Définir l'encodage des caractères dans l'en-tête HTTP
        header('Content-Type: text/html; charset=utf-8');

        // Construction du mail et envoi du mail
        $titre = "Creation de compte sur l'application web ZooArcadia en tant que " . htmlspecialchars($postData['compte'], ENT_QUOTES, 'UTF-8');
        $description = "Félicitations! Votre compte utilisateur en tant que " . htmlspecialchars($postData['compte'], ENT_QUOTES, 'UTF-8') . " est créé dans l'application ZooArcadia. Merci de vous rapprocher de l'administrateur du site web pour obtenir votre mot de passe. Votre username est " . htmlspecialchars($postData['userName'], ENT_QUOTES, 'UTF-8');
        $emailContact = "zooarcadia2024@gmail.com";
        $emailRecipient = htmlspecialchars($postData['userName'], ENT_QUOTES, 'UTF-8');

        try {
            $success = $this->controller->sendContactMail($titre, $description, $emailContact, $emailRecipient);
        } catch (Exception $e) {
            // Gestion de l'erreur
            $success = false;
            error_log("Error sending email: " . $e->getMessage());
        }

        // Redirection vers la page information (routeur) avec indicateur de succès ou d'échec
        $navbar = new Navbar();
        $redirectUrl = $navbar->urlValue('/information', ['success_register' => $success ? '1' : '0']);
        header("Location: " . $redirectUrl);
        exit();
    }

    //fonction d'envoi de mail de contact pour un visiteur avec pseudo
    public function handleForm2($postData)
    {
        $titre = $postData['titre'];
        $description = $postData['description'];
        $emailContact = $postData['emailContact'];
        $emailRecipient = isset($postData['emailRecipient']) ? $postData['emailRecipient'] : 'zooarcadia2024@gmail.com';
        try {

            $success = $this->controller->sendContactMail($titre, $description, $emailContact, $emailRecipient);

        } catch (Exception $e) {
            // Gestion de l'erreur
            $success = false;
            error_log("Error sending email: " . $e->getMessage());
        }
        $navbar = new Navbar();
        $redirectUrl = $navbar->urlValue('/information', ['success' => $success ? '1' : '0']);
        header("Location: " . $redirectUrl);
        exit();
    }

}

// Vérification du token CSRF
require 'app/controllers/handler/security_receiver.php';


//Envoi de mail via le formulaire de contact visiteur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submitForm2'])) {
        $mailHandler = new MailHandler();
        $mailHandler->handleForm2($_POST);
    }
}