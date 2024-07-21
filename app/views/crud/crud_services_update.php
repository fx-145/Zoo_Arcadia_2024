<?php
require_once 'app/controllers/ServiceController.php';
include_once "app/controllers/handler/SessionRouter.php";

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_id'])&& !empty($_POST['service_id'])) {
    // Validation de l'ID du service
    $service_id = filter_input(INPUT_POST, 'service_id', FILTER_VALIDATE_INT);
    
    if ($service_id === false) {
        die('ID de service invalide.');
    }

    // Création d'une instance du contrôleur de service
    $controller = new ServiceController();
    $result = $controller->getServiceWithId($service_id);

    if ($result) {
        $service_name = htmlspecialchars($result['service_name'], ENT_QUOTES, 'UTF-8');
        $service_description = htmlspecialchars($result['service_description'], ENT_QUOTES, 'UTF-8');
    } else {
        die('Service non trouvé.');
    }
} else {
    die('Requête invalide.');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un service</title>
</head>
<body>
    <!-- Affichage de la navbar -->
    <div id="content">
        <?php include_once "app/views/layouts/navbar.php"; ?>
        
        <div class="container-fluid py-5 main-content">
        <button class="btn btn-primary" id="menu-toggle"><></button>
            <h1 class="mb-4">Modifier un service</h1>
            <form action="crudServiceHandler" method="post">
                <!-- Génération du token CSRF -->
                <?php include "app/controllers/handler/security_issuer.php"; ?>
                <input type="hidden" value="<?php echo $service_id; ?>" id="service_id" name="service_id">
                <div class="form-group col-md-2">
                    <label for="service_name">Nom du service à modifier:</label>
                    <input value="<?php echo $service_name; ?>" type="text" class="form-control" id="service_name" name="new_service_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="service_description">Description:</label>
                    <textarea class="form-control" id="service_description" name="new_service_description" rows="4" required><?php echo $service_description; ?></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit_update_service">Modifier</button>
                <a href="crud_services" class="btn btn-secondary ml-2">Annuler</a>
            </form>
            <hr>
        </div>
        <br>
        <!-- Appel du footer -->
        <?php include "app/views/layouts/footer.php"; ?>
        <!-- Appel des scripts -->
        <?php include "app/views/layouts/scripts.php"; ?>
        <!-- Appel du script de la sidebar --> 
        <script src="public/js/sidebar_script.js"></script>
    </div>
</body>
</html>
