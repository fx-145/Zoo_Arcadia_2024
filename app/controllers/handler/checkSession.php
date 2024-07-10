<?php
if (session_status() == PHP_SESSION_NONE) {
    // Si aucune session n'est démarrée, démarrer une nouvelle session
    session_start();
}
// Vérification si l'utilisateur est authentifié
if (!isset($_SESSION['userName']) || !isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
    // Si non, redirection vers la page de connexion
    header('Location: connection');
    exit;
}
// Si le user est authentifié et si son rôle correspond, le code de la page protégée s'exécute
