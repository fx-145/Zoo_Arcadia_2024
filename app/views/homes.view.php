<?php
session_start();
require_once 'app/controllers/HomeController.php';
$controller = new HomeController();
$result = $controller->getHomesAndOnePicture();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Habitats</title>
  <link rel="stylesheet" href="../../public/css/main.css">

</head>

<body>
  <!-- Affichage de la navbar -->
  <?php include_once "layouts/navbar.php"; ?>

  <!-- Affichage tableau bootstrap avec la classe main-content -->
  <div class="container-fluid main-content py-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <!-- List group-->
        <ul class="list-group shadow macouleur">
          <!-- list group item-->
          <li class="list-group-item macouleur">
            <!-- Custom content -->
            <div class="media align-items-lg-center flex-column flex-lg-row p-3 macouleur">
              <div class="media-body order-2 order-lg-1 macouleur">
                <h1 class="text-center">Les habitats du Zoo</h1>
                <table class="table table-striped table-bordered table-hover table-primary">
                  <thead class="thead-dark text-center">
                   
                  </thead>
                  <tbody>
                    <?php foreach ($result as $row): ?>
                      <tr>
                        <td class="align-middle">
                          <h2><?php echo htmlspecialchars($row['home_name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        </td>
                        <td class="text-center align-middle">
                          <form id="id<?php echo $row['home_id']; ?>" action="homeDetails" method="post">
                            <input type="hidden" name="home_id"
                              value="<?php echo htmlspecialchars($row['home_id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="image" class="img-fluid"
                              src="<?php echo htmlspecialchars($row['home_picture_path'], ENT_QUOTES, 'UTF-8'); ?>"
                              alt="Image de <?php echo htmlspecialchars($row['home_name'], ENT_QUOTES, 'UTF-8'); ?>"
                              width="600">
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>



  <!-- Appel du footer -->
  <?php include "layouts/footer.php"; ?>
  <!-- Appel des scripts -->
  <?php include "layouts/scripts.php"; ?>
</body>

</html>