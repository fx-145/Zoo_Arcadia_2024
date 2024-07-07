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
  <?php
  include_once ("layouts/navbar.php")
    ?>

  <!-- Affichage tableau bootstrap -->
  <div class="container">
    <?php
     if (isset($_GET['success_report_e'])) {
      $success = $_GET['success_report_e'];
    
      switch ($success) {
          case '1':
              echo '<p style="color: green;">Le rapport d\'alimentation de l\'animal a été envoyé avec succès!</p>';
              break;
          default:
              echo '<p style="color: red;">Échec de l\'envoi du rapport d\'alimentation animal. Veuillez réessayer.</p>';
              break;
      }
  }
    if (isset($_GET['success'])) {
      $success = $_GET['success'];
      switch ($success) {
          case '1':
              echo '<p style="color: green;">Le message a été envoyé avec succès!</p>';
              break;
          default:
              echo '<p style="color: red;">Échec de l\'envoi du message. Veuillez réessayer.</p>';
              break;
      }
  }
  
  if (isset($_GET['login'])) {
      $login = $_GET['login'];
      switch ($login) {
          case '0':
              echo '<p style="color: red;">Erreur lors de l\'authentification. Veuillez réessayer.</p>';
              break;
          
      }
  } elseif (isset($_GET['success'])) {
      // Si 'success' est défini mais pas 'login', on ne fait rien
      //eviter le message "erreur inattendue" dans le cas du rapport d'alimentation employé
  } elseif (!isset($_GET['success_report_e'])) {
      echo '<p style="color: red;">Erreur inattendue</p>';
  }
  

    ?>
  </div>
  <!-- Appel du footer -->
  <?php include ("layouts/footer.php"); ?>

  <!-- Appel des scripts -->
  <?php include ("layouts/scripts.php"); ?>
</body>

</html>