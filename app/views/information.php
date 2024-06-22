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
    if (isset($_GET['success'])) {
        $success = $_GET['success'];
        if ($success == '1') {
            echo '<p style="color: green;">Le message a été envoyé avec succès!</p>';
        } else {
            echo '<p style="color: red;">Échec de l\'envoi du message. Veuillez réessayer.</p>';
        }
    }
    ?>
  </div>




  <!-- Appel du footer -->
  <?php include ("layouts/footer.php"); ?>

  <!-- Appel des scripts -->
  <?php include ("layouts/scripts.php"); ?>
</body>

</html>