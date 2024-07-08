<?php
require_once 'app/controllers/router/Router.controller.php';
$navbar = new Navbar();

// démarrer la session
session_start();

// effacer toutes les variables de session
$_SESSION = array();

//détruire la session
session_destroy();

// Redirection vers la page de login
header("Location:connection");
exit;