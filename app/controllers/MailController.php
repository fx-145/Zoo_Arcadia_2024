<?php

require_once '../../models/MailModel.php';
require_once '../handler/MailHandler.php';

class MailController
{
    private $model;

    public function __construct() {
        $this->model = new MailModel();
    }

    public function sendContactMail($titre, $description, $emailContact,$emailRecipient)
    {
        // Appelle la méthode du modèle pour envoyer le mail
        return $this->model->sendMail($titre, $description, $emailContact, $emailRecipient);
    }
}