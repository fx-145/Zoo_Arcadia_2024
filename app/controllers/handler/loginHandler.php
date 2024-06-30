<?php
require_once '../UserController.php';
require_once '../../controllers/router/Router.controller.php';
//activer le routeur
$navbar = new Navbar();

$controller = new UserController();
if (isset($_POST['userName']) && !empty($_POST['userName']) && filter_var($_POST['userName'], FILTER_VALIDATE_EMAIL)) {
    //récupérer l'email renseigné dans le formulaire: sécurité: vérifier que l'adresse mail est bien sous format email avec filter_var
    //trim permet de supprimer les espaces superflus
    $userName = trim($_POST['userName']);
    //Vérifier si le username est bien dans la base de données
    $resultUsername = $controller->checkUserLogin($userName);
}


if (isset($_POST['password']) && !empty($_POST['password']) && $resultUsername) {
    //récupérer le password renseigné dans le formulaire
    $passwordForm = trim($_POST['password']);
    // Vérifier si le password est correct
    // récupérer le password qui correspond au userName dans la bdd
    $password = $controller->getPassword($userName);
    // Comparer le mot de passe saisi à celui présent dans la bdd
    $resultPassword = $controller->checkPassword($passwordForm, $password);
}


if ($resultUsername && $resultPassword)
// On vérifie quel est le rôle du user
{
    $role_name = $controller->checkRole($userName);

    //on va stocker dans la variable superglobale $_Session le nom de l'utilisateur loggé et son rôle
    // Définir les informations de la session
    session_start();
    $_SESSION['userName'] = $userName;
    $_SESSION['role'] = $role_name;

    // Selon le rôle, on reroute vers l'espace admin, employé ou vétérinaire
    $controller->roleRouter($userName, $role_name);

} else {
    //redirection vers la page information, avec le login=0, qui sera interprété comme "erreur d'authentification"
    $redirectUrl = $navbar->urlValue('/information', [
        'login' => '0',
    ]);
    header("Location: " . $redirectUrl);
    exit;
}








