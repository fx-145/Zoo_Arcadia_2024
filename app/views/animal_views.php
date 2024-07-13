<?php
require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/ViewController.php';
$controller = new ViewController();
$result = $controller->getAnimalViews();
?>
<!-- Appel de l'area admin-->
<?php include_once "app/views/elements/admin_area.php"; ?>
<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_admin.php"; ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>
    <body>
        <div>
            <div class="container-fluid py-5 main-content">
                <button class="btn btn-primary" id="menu-toggle">
                    <>
                </button>
                <h1 class="text-left mb-4">Liste des vues par animal</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-primary text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom de l'animal</th>
                                <th>Race</th>
                                <th>Nombre de vues</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['animal_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['race']); ?></td>
                                    <td><?php echo htmlspecialchars($row['views']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if (empty($result)) {
                    echo 'pas d\'enregistrements';
                } ?>
                <br>
                <a href="resetViewsHandler" class="btn btn-danger">réinitialiser</a>
            </div>
        </div>
        <br>
        <!-- Appel du footer -->
        <?php include "layouts/footer.php"; ?>
        <!-- Appel des scripts -->
        <?php include "layouts/scripts.php"; ?>
        <!-- Appel du script de la sidebar -->
        <script src="../../public/js/sidebar_script.js"></script>

    </body>

    </html>