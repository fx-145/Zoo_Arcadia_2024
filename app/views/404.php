<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 error</title>
  <!-- appel du css bootstrap, avec les modifs de main.css -->
  <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
  <?php
  include ("layouts/navbar.php")
    ?>
  <div>
    <h1>Desole, page inexistante.</h1>

    <p class="mt4">
      <a href="/" class="text-blue underline">retour page accueil.</a>
    </p>
    <!-- Appel du footer -->
    <?php include "layouts/footer.php"; ?>
    <!-- Appel des scripts -->
    <?php include "layouts/scripts.php"; ?>
</body>

</html>