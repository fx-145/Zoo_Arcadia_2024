<?php
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/PictureController.php';
 
// Vérification si le formulaire a été soumis
if (isset($_POST['home_id'])) {
  // Récupération des données du formulaire
  $home_id = $_POST['home_id'];

  // Création d'une instance du modèle HomeModel
  $controller = new HomeController();
  $result = $controller->getHomeWithId($home_id);
  $home_name = $result['home_name'];
  $home_description = $result['home_description'];

  // Création d'une instance du modèle PictureModel pour afficher les photos de l'habitat
  $controllerPics = new PictureController();
  $resultPics = $controllerPics->getHomePictures($home_id);
}
?>

    <!-- Appel de l'area admin -->
    <?php include_once("app/views/elements/admin_area.php"); ?>
    <!-- Affichage de la sidebar -->
    <?php include_once("app/views/layouts/sidebar_admin.php"); ?>
    <!-- Affichage de la navbar -->
    <div id="content">
        <?php include_once("app/views/layouts/navbar.php"); ?>
        <br>
        <body>
        <button class="btn btn-success mx-2" id="menu-toggle"><></button>
        <div class="container mt-4">
            <h1 class="mb-4">Modifier un habitat</h1>
            <form action="crudHomeHandler" method="post">
                <input type="hidden" value="<?php echo $home_id; ?>" id="home_id" name="home_id">
                <div class="form-group">
                    <label for="home_name">Nom de l'habitat à modifier:</label>
                    <input value="<?php echo htmlspecialchars($home_name, ENT_QUOTES, 'UTF-8'); ?>" type="text" class="form-control" id="home_name" name="newhome_name" required>
                </div>
                <div class="form-group">
                    <label for="home_description">Description:</label>
                    <textarea class="form-control" id="home_description" name="newhome_description" rows="4" required><?php echo htmlspecialchars($home_description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit_update_home">Modifier</button>
                <a href="crud_homes.php" class="btn btn-secondary ml-2">Annuler</a>
            </form>
            <hr>
            <!-- Tableau Bootstrap affichage de toutes les photos des habitats -->
            <h2 class="mt-4">Photos de l'habitat</h2>
            <form action="crudHomePictureHandler" method="post">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Photos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultPics as $row): ?>
                            <tr>
                                <td><img src="<?php echo "../../" . htmlspecialchars($row['home_picture_path'], ENT_QUOTES, 'UTF-8'); ?>" alt="Photo de l'habitat" class="img-fluid" width="200"></td>
                                <td>
                                    <input type="hidden" name="home_id" value="<?php echo htmlspecialchars($home_id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="home_name" value="<?php echo htmlspecialchars($home_name, ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="home_picture_id" value="<?php echo htmlspecialchars($row['home_picture_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="home_picture_path" value="<?php echo htmlspecialchars($row['home_picture_path'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <button type="submit" name="submit_delete_home_picture" class="btn btn-danger">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
            <form action="crud_home_picture_add" method="post" class="mt-2">
                <input type="hidden" name="home_id" value="<?php echo htmlspecialchars($home_id, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="home_name" value="<?php echo htmlspecialchars($home_name, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="btn btn-success">Ajouter Photo</button>
            </form>
        </div>
        <br>
        <!-- Appel du footer -->
        <?php include("app/views/layouts/footer.php"); ?>
        <!-- Appel des scripts -->
        <?php include("app/views/layouts/scripts.php"); ?>
        <!-- Appel du script de la sidebar --> 
        <script src="public/js/sidebar_script.js"></script>
    </div>
</body>
</html>