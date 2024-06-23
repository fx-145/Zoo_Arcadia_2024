<?php

require_once '../models/OpinionModel.php';

class OpinionController
{
    private $model;

    public function __construct()
    {
        $this->model = new OpinionModel();
    }

    public function sendVisitorOpinion($pseudo, $opinion)
    {
        return $this->model->sendVisitorOpinion($pseudo, $opinion);

    }
}

// Sécuriser pour valider les données du formulaire
if (isset($_POST['pseudo']) && !empty(trim($_POST['pseudo'])) && isset($_POST['avis']) && !empty(trim($_POST['avis']))) {
    // Utiliser htmlspecialchars pour prévenir des attaques xss
    $pseudo = htmlspecialchars(trim($_POST['pseudo']), ENT_QUOTES, 'UTF-8');
    $opinion = htmlspecialchars(trim($_POST['avis']), ENT_QUOTES, 'UTF-8');

    // Valider la longueur du pseudo et de l'avis, pour éviter que la lognueur soit acceptable
    if (strlen($pseudo) > 0 && strlen($pseudo) <= 50 && strlen($opinion) > 0 && strlen($opinion) <= 500) {
        try {
            
            $controller = new OpinionController();
            // Enregistrer l'avis visiteur dans la BDD avec le statut "en attente de validation" par l'employé
            $controller->sendVisitorOpinion($pseudo, $opinion);
            $success = $controller;
        } catch (Exception $e) {
            // Gestion de l'erreur
            $success = false;
            error_log("Error sending email: " . $e->getMessage());
        }

        // Redirection vers la page d'accueil (routeur) avec indicateur de succès ou d'échec
        $navbar = new Navbar();
        $redirectUrl = $navbar->urlValue('/information', ['success' => $success ? '1' : '0']);
        header("Location: " . $redirectUrl);
        exit();


    } else {
        // Gérer les erreurs de validation
        echo 'Pseudo ou avis invalide.';
    }
} else {
    echo 'Pseudo et avis sont requis.';
}






