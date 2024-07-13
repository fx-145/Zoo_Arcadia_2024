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
  <?php include_once "layouts/navbar.php"; ?>

  <!-- Affichage tableau bootstrap avec la classe main-content -->
  <div class="container-fluid main-content">
    <br><br>
    <h1 class="text-center">Les services proposés par notre zoo</h1>
    <br><br>
    <table class="table table-striped table-bordered table-primary">
      <thead class="thead-dark text-center">
        <tr>
          <th>Service actuellement proposé</th>
          <th>Pour en savoir plus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['service_name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($row['service_description'], ENT_QUOTES, 'UTF-8'); ?></td>
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
