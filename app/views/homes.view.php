<?php
require_once 'app/controllers/HomeController.php';
$controller = new HomeController();
$result = $controller->getHomesAndOnePicture();
//var_dump($result);


?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>habitats</title>
  <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>

  <body>
    <!-- Affichage de la navbar -->
    <?php
    include_once ("layouts/navbar.php")
      ?>
    <div class="container py-5">



      <div class="row">
        <div class="col-lg-8 mx-auto">

          <!-- List group-->
          <ul class="list-group shadow">

            <!-- list group item-->
            <li class="list-group-item">
              <!-- Custom content </div><img src="https://bootstrapious.com/i/snippets/sn-cards/shoes-1_gthops.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">-->
              <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                <div class="media-body order-2 order-lg-1">
                  <h2 class="mt-0 font-weight-bold mb-2">Les habitats du Zoo</h2>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $row): ?>
                        <tr>
                          <td>
                            <a href="/homeDetails?home_id=<?php echo urlencode($row['home_id']); ?>">
                              <?php echo htmlspecialchars($row['home_name']); ?>
                            </a>
                          </td>
                          <td>
                            <img src="<?php echo htmlspecialchars($row['home_picture_path']); ?>"
                              alt="<?php echo htmlspecialchars($row['home_name']); ?>" width="350">
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>


            </li>


            <!-- Appel du footer -->
            <?php include ("layouts/footer.php"); ?>

            <!-- Appel des scripts -->
            <?php include ("layouts/scripts.php"); ?>
  </body>

</html>