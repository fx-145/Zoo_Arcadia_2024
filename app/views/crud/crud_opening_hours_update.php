<?php
require_once 'app/controllers/OpeningTimeController.php';

if (isset($_POST['opening_time_id']) && !empty($_POST['opening_time_id'])) {
    $op_hours_id = $_POST['opening_time_id'];
    $controller = new OpeningTimeController();
    $result = $controller->getOpeningHoursWithId($op_hours_id);
    $opening_day = $result['opening_day'];
    $opening_time = substr($result['opening_time'], 0, 5);
    $closing_time = substr($result['closing_time'], 0, 5);
}
?>

<!-- Appel de l'area admin -->
<?php include_once 'app/views/elements/admin_area.php'; ?>
<!-- Affichage de la sidebar -->
<?php include_once 'app/views/layouts/sidebar_admin.php'; ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>
    <br>

    <body>
        <button class="btn btn-success mx-2" id="menu-toggle">
            <>
        </button>
        <div class="container mt-4">
            <h1 class="mb-4">Modifier l'horaire</h1>
            <form action="crudOpeningHoursHandler" method="post">
                <!-- Génération du token CSRF -->
                <?php include "app/controllers/handler/security_issuer.php"; ?>
                <input type="hidden" value="<?php echo $op_hours_id; ?>" id="opening_time_id" name="opening_time_id">
                <div class="form-group">
                    <label for="opening_day">Jour</label>
                    <input value="<?php echo $opening_day; ?>" type="text" class="form-control" id="op_day"
                        name="opening_day" readonly>
                </div>

                <div class="form-group">
                    <label for="opening_time">heure d'ouverture</label>
                    <input value="<?php echo $opening_time; ?>" type="text" class="form-control" id="new_opening_time"
                        name="new_opening_time" required>
                </div>
                <div class="form-group">
                    <label for="closing_time">heure de fermeture</label>
                    <input value="<?php echo $closing_time; ?>" type="text" class="form-control" id="new_closing_time"
                        name="new_closing_time" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit_update_hours">Modifier</button>
                <a href="crud_opening_hours" class="btn btn-secondary ml-2">Annuler</a>
            </form>
            <hr>

        </div>
        <br>
        <!-- Appel du footer -->
        <?php include 'app/views/layouts/footer.php'; ?>
        <!-- Appel des scripts -->
        <?php include 'app/views/layouts/scripts.php'; ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
</div>
</body>

</html>