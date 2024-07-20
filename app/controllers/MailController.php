<?php
require_once __DIR__ . '../../../config.php';
require_once APP_MODEL_PATH . '/MailModel.php';
//require_once __DIR__ . '../handler/MailHandler.php';

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