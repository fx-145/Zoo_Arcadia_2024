<?php
session_start();
require_once 'app/controllers/handler/serviceHandler.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
  <!-- Affichage de la navbar -->
  <?php
  include_once "layouts/navbar.php"
    ?>
  <!-- Affichage tableau bootstrap -->
  <div class="container">
    <br><br>
    <h1>Les services proposés par notre zoo</h1>
    <br><br>
    <table class="table">
      <thead>
        <tr>
          <th>Service actuellement proposé</th>
          <th>Pour en savoir plus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?php echo $row['service_name']; ?></td>
            <td><?php echo $row['service_description']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br><br>
  </div>
  <!-- Appel du footer -->
  <?php include "layouts/footer.php"; ?>
  <!-- Appel des scripts -->
  <?php include "layouts/scripts.php"; ?>
</body>

</html>