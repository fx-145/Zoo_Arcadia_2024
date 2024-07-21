<?php
session_start();
?>
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
    function displayMessage($type, $messages)
    {
      $status = $_GET[$type] ?? null;
      if ($status !== null) {
        if ($status === '1') {
          echo '<p style="color: green;">' . $messages['success'] . '</p>';
        } else {
          echo '<p style="color: red;">' . $messages['failure'] . '</p>';
        }
      }
    }

    $messages = [
      'success_report_e' => [
        'success' => "Le rapport d'alimentation de l'animal a été envoyé avec succès!",
        'failure' => "Échec de l'envoi du rapport d'alimentation animal. Veuillez réessayer."
      ],
      'success_report_v' => [
        'success' => "Le rapport de visite de l'animal a été envoyé avec succès!",
        'failure' => "Échec d'envoi du rapport de visite animal. Veuillez réessayer."
      ],
      'success' => [
        'success' => "Le message a été envoyé avec succès!",
        'failure' => "Échec de l'envoi du message. Veuillez réessayer."
      ],
      'success_register' => [
        'success' => "Le nouvel utilisateur a été créé avec succès, un email lui a été envoyé avec succès!",
        'failure' => "Échec de l'enregistrement du nouvel utilisateur. Veuillez réessayer."
      ],
      'login' => [
        'failure' => "Erreur lors de l'authentification. Veuillez réessayer."
      ],
      'register' => [
        'failure' => "Erreur lors de l'enregistrement. Veuillez réessayer."
      ]
    ];

    foreach ($messages as $type => $msg) {
      displayMessage($type, $msg);
    }

    // Afficher un message d'erreur inattendue si aucun autre message n'est affiché
    $keys = array_keys($messages);
    $showUnexpectedError = true;
    foreach ($keys as $key) {
      if (isset($_GET[$key])) {
        $showUnexpectedError = false;
        break;
      }
    }
    if ($showUnexpectedError) {
      echo '<p style="color: red;">Erreur inattendue</p>';
    }
    ?>
  </div>
<div>
<a href="<?php 
    if (!empty($_SERVER['HTTP_REFERER'])) {
        echo htmlspecialchars($_SERVER['HTTP_REFERER'], ENT_QUOTES, 'UTF-8');
    } else {
      header("Location: /");
exit;

    }
?>" class="btn btn-secondary">
<?php 
if (!empty($_SERVER['HTTP_REFERER'])) {
    echo 'Retour à la page précédente';
} else {
    echo 'Retour à la page d\'accueil';
}
?>
</a>
</div>
<br>
  <!-- Appel du footer -->
  <?php include "layouts/footer.php"; ?>
  <!-- Appel des scripts -->
  <?php include "layouts/scripts.php"; ?>
</body>

</html>
