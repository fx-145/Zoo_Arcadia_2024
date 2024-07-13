<?php
require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/ServiceController.php';
include_once "app/controllers/handler/SessionRouter.php";

$controller = new ServiceController();
$result = $controller->getServices();
?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>

  

    <body>
        <div class="container-fluid py-5 main-content">
        <button class="btn btn-primary" id="menu-toggle">
        <>
    </button>
            <h1 class="mb-4">Edition des Services</h1>
            <!-- affichage de tous les habitats -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-primary">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Nom du service</th>
                            <th>Description du service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['service_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['service_description'], ENT_QUOTES, 'UTF-8'); ?>
                                </td>

                                <td>
                                    <form action="crud_services_update" method="post" style="display:inline;">
                                        <!-- Génération du token CSRF -->
                                        <?php include "app/controllers/handler/security_issuer.php"; ?>
                                        <input type="hidden" name="service_id"
                                            value="<?php echo htmlspecialchars($row['service_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <button type="submit" name="submit_update_service"
                                            class="btn btn-primary btn-custom mr-2">Modifier</button>
                                    </form>
                                    <br><br>
                                    <form action="crudServiceHandler" method="post" style="display:inline;">
                                        <!-- Génération du token CSRF -->
                                        <?php include "app/controllers/handler/security_issuer.php"; ?>
                                        <input type="hidden" name="service_id"
                                            value="<?= htmlspecialchars($row['service_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <?php if ($_SESSION['role'] == 'administrateur'): ?>
                                            <button type="submit" name="submit_delete_service"
                                                class="btn btn-danger btn-custom ml-2">Supprimer</button>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Formulaire caché -->
            <form id="hiddenserviceUpdateForm" method="post" action="area_admin_services_update.php"
                style="display:none;">
                <input type="hidden" name="id" id="hiddenserviceUpdateFormId">
            </form>
        </div>
        <!-- Appel du footer -->
        <?php include "app/views/layouts/footer.php"; ?>
        <!-- Appel des scripts -->
        <?php include "app/views/layouts/scripts.php"; ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
</div>
</body>

</html>