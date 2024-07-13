<?php
if (session_status() == PHP_SESSION_NONE) {
  // Si aucune session n'est démarrée, démarrer une nouvelle session

  session_start();
}
// Vérification du token CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    header("Location: /connection");
    exit;
  }
}