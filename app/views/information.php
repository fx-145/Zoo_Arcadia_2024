<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Information</title>
  <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
  <!-- Affichage de la navbar -->
  <?php include_once "layouts/navbar.php" ?>

  <!-- Affichage tableau bootstrap -->
  <div class="container">
    <?php
    function displayMessage($type, $successMsg, $failureMsg)
    {
      $success = $_GET[$type] ?? null;
      if ($success !== null) {
        if ($success === '1') {
          echo '<p style="color: green;">' . $successMsg . '</p>';
        } else {
          echo '<p style="color: red;">' . $failureMsg . '</p>';
        }
      }
    }

    displayMessage('success_report_e', "Le rapport d'alimentation de l'animal a été envoyé avec succès!", "Échec de l'envoi du rapport d'alimentation animal. Veuillez réessayer.");
    displayMessage('success_report_v', "Le rapport de visite de l'animal a été envoyé avec succès!", "Échec d'envoi du rapport de visite animal. Veuillez réessayer.");
    displayMessage('success', "Le message a été envoyé avec succès!", "Échec de l'envoi du message. Veuillez réessayer.");

    if (isset($_GET['login']) && $_GET['login'] === '0') {
      echo '<p style="color: red;">Erreur lors de l\'authentification. Veuillez réessayer.</p>';
    } elseif (!isset($_GET['success_report_e']) && !isset($_GET['success_report_v']) && !isset($_GET['success'])) {
      echo '<p style="color: red;">Erreur inattendue</p>';
    }
    ?>
  </div>
  <!-- Appel du footer -->
  <?php include "layouts/footer.php"; ?>
  <!-- Appel des scripts -->
  <?php include "layouts/scripts.php"; ?>
</body>

</html>