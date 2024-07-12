<?php
require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/OpeningTimeController.php';
$controller = new OpeningTimeController();
$result = $controller->getOpeningHours();
?>

<!-- Appel de l'area admin-->
<?php include_once "app/views/elements/admin_area.php"; ?>
<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_admin.php"; ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>
    <br>
    <button class="btn btn-success mx-2" id="menu-toggle">
        <>
    </button>

    <body>
        <div class="container mt-4">
            <h1 class="mb-4">Edition des animaux</h1>
            <!-- affichage de tous les habitats -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Jour</th>
                            <th>Heure début</th>
                            <th>Heure Fin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $row['opening_day']; ?></td>
                                <td><?php echo substr($row['opening_time'], 0, 5); ?></td>
                                <td><?php echo substr($row['closing_time'], 0, 5); ?></td>
                                <td>
                                    <form action="crud_opening_hours_update" method="post" style="display:inline;">
                                        <input type="hidden" name="opening_time_id"
                                            value="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <button type="submit" name="submit_update_opening_hours"
                                            class="btn btn-success btn-custom mr-2">Modifier</button>
                                    </form>
                                    <br><br>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Appel du footer -->
        <?php include 'app/views/layouts/footer.php'; ?>
        <!-- Appel des scripts -->
        <?php include 'app/views/layouts/scripts.php'; ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
</div>
</body>

</html>