<?php
require_once '../UserController.php';
require_once 'MailHandler.php';

class RegisterHandler
{
    private $controller;

    public function __construct()
    {
        $this->controller = new UserController(); // Correction : Utiliser UserController
    }

    public function registerForm()
    {
        var_dump(isset($_POST['userName']));
        // Récupérer l'userName renseigné dans le formulaire
        if (isset($_POST['userName']) && !empty($_POST['userName'])) {
            $userName = $_POST['userName'];
            ;
        }

        // Récupérer le password renseigné dans le formulaire
        if (isset($_POST['compte'])) {
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
        }

        // Récupérer le rôle (employé ou vétérinaire) renseigné dans le formulaire
        if (isset($_POST['compte'])) {
            $roleName = $_POST['compte'];
        }

        // Vérifier si le username existe déjà et le niveau de sécurité du mot de passe
        if (isset($_POST['userName'])) {
            $result = $this->controller->checkUser($userName);
            $result2 = $this->controller->validatePassword($password, $confirmPassword);
            var_dump($result);
            if ($result && $result2) {
                // Si le username n'existe pas déjà, on poursuit : Créer un user_id sécurisé
                $uuid = $this->controller->CreateSecuredId();

                //  Hashage du password (encryptage)
                $hashedPassword = $this->controller->CreateSecuredPassword($password);

                //  Récupérer le role_id en fonction du role_name
                $roleId = $this->controller->getRoleId($roleName);

                // Insérer les données dans la base : dans la table users
                $this->controller->RegisterUser($uuid, $userName, $hashedPassword);

                // Insérer les données de rôle dans la base : dans la table roles
                $this->controller->RegisterRole($uuid, $roleId);

                // Rediriger l'utilisateur vers une nouvelle page

            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['submitForm'])) {
        // Exécuter la fonction d'enregistrement utilisateur RegisterForm encapsulée
        // dans la classe RegisterHandler
        //$registerHandler = new RegisterHandler();
        //$registerHandler->registerForm();

        //Envoyer un message par email au nouvel utilisateur l'informant que
        // son compte est créé, et qu'il faut qu'il se rapproche de l'admin
        // pour récupérer son mot de passe afin d'accéder à son compte
        $mailHandler = new MailHandler();
        $mailHandler->handleForm1($_POST);

    }
}





