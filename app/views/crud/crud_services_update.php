<?php
require_once 'app/controllers/ServiceController.php';
include_once "app/controllers/handler/SessionRouter.php";

// Vérification si le formulaire a été soumis
if (isset($_POST['service_id'])) {
    // Récupération des données du formulaire
    $service_id = $_POST['service_id'];

  // Création d'une instance du modèle serviceModel
  $controller = new ServiceController();
  $result = $controller->getserviceWithId($service_id);
  $service_name = $result['service_name'];
  $service_description = $result['service_description'];

}


?>

<!-- Appel de l'area admin -->
<?php //include_once("app/views/elements/admin_area.php"); ?>
    <!-- Affichage de la sidebar -->
    <?php //include_once("app/views/layouts/sidebar_admin.php"); ?>
    <!-- Affichage de la navbar -->
    <div id="content">
        <?php include_once("app/views/layouts/navbar.php"); ?>
        <br>
        <body>
        <button class="btn btn-success mx-2" id="menu-toggle"><></button>
        <div class="container mt-4">
            <h1 class="mb-4">Modifier un service</h1>
            <form action="crudServiceHandler" method="post">
                <input type="hidden" value="<?php echo $service_id; ?>" id="service_id" name="service_id">
                <div class="form-group">
                    <label for="service_name">Nom du service à modifier:</label>
                    <input value="<?php echo htmlspecialchars($service_name, ENT_QUOTES, 'UTF-8'); ?>" type="text" class="form-control" id="service_name" name="new_service_name" required>
                </div>
                <div class="form-group">
                    <label for="service_description">Description:</label>
                    <textarea class="form-control" id="service_description" name="new_service_description" rows="4" required><?php echo htmlspecialchars($service_description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit_update_service">Modifier</button>
                <a href="crud_services" class="btn btn-secondary ml-2">Annuler</a>
            </form>
            <hr>
            
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