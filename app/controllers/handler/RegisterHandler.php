<?php
require_once 'app/controllers/UserController.php';
require_once 'MailHandler.php';

class RegisterHandler
{
    private $controller;
    public $registerUser;
    public $registerRole;

    public function __construct()
    {
        $this->controller = new UserController();
    }

    public function registerForm()
    {
        try {
            // Récupérer l'userName renseigné dans le formulaire
            if (isset($_POST['userName']) && !empty($_POST['userName'])) {
                $userName = $_POST['userName'];
            }

            // Récupérer le password renseigné dans le formulaire
            if (isset($_POST['password']) && isset($_POST['confirmPassword']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];
            }

            // Récupérer le rôle (employé ou vétérinaire) renseigné dans le formulaire
            if (isset($_POST['compte']) && !empty($_POST['compte'])) {
                $roleName = $_POST['compte'];
            }

            // Vérifier si le username existe déjà (checkuser) et passage en revue des critères pour le niveau de sécurité du mot de passe (validatePassword)
            if (isset($userName)) {
                $result = $this->controller->checkUser($userName);
                $result2 = $this->controller->validatePassword($password, $confirmPassword);

                if ($result && $result2) {
                    // Si le username n'existe pas déjà, on poursuit : Créer un user_id sécurisé
                    $uuid = $this->controller->CreateSecuredId();

                    // Hashage du password (encryptage)
                    $hashedPassword = $this->controller->CreateSecuredPassword($password);

                    // Récupérer le role_id en fonction du role_name
                    $roleId = $this->controller->getRoleId($roleName);

                    // Insérer les données dans la base : dans la table users
                    $this->registerUser = $this->controller->RegisterUser($uuid, $userName, $hashedPassword);

                    // Insérer les données de rôle dans la base : dans la table roles
                    $this->registerRole = $this->controller->RegisterRole($uuid, $roleId);

                    // Rediriger l'utilisateur vers une nouvelle page
                    return true;
                }
            }
        } catch (PDOException $e) {
            // Gérer l'erreur
            error_log('Error registering user: ' . $e->getMessage());
            return false; // Echec
        }

        return false; // Echec par défaut
    }
}

// Vérification du token CSRF
require 'security_receiver.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submitForm'])) {
        // Exécuter la fonction d'enregistrement utilisateur RegisterForm encapsulée
        // dans la classe RegisterHandler

        $registerHandler = new RegisterHandler();
        $resultRegister = $registerHandler->registerForm();

        // Vérifier si les utilisateurs et les rôles sont bien enregistrés
        if ($resultRegister) {
            // Envoyer un message par email au nouvel utilisateur l'informant que
            // son compte est créé, et qu'il faut qu'il se rapproche de l'admin
            // pour récupérer son mot de passe pour accéder à son compte
            $mailHandler = new MailHandler();
            $mailHandler->handleForm1($_POST);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Enregistrement réussi!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            echo 'ça fonctionne';
        } else {
            // Message d'échec de l'enregistrement
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Échec de l\'enregistrement!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

        }
    }
}






