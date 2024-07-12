<?php
require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/HomeController.php';
$controller = new HomeController();
$result = $controller->getHomes();
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
            <h1 class="mb-4">Edition des habitats</h1>
            <!-- affichage de tous les habitats -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nom de l'habitat</th>
                            <th>Description de l'habitat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['home_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['home_description'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <form action="crud_homes_update" method="post" style="display:inline;">
                                        <input type="hidden" name="home_id"
                                            value="<?php echo htmlspecialchars($row['home_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <button type="submit" name="submit_update_home"
                                            class="btn btn-success btn-custom mr-2">Modifier</button>
                                    </form>
                                    <br><br>
                                    <form action="crudHomeHandler" method="post" style="display:inline;">
                                        <input type="hidden" name="home_id"
                                            value="<?php echo htmlspecialchars($row['home_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <button type="submit" name="submit_delete_home"
                                            class="btn btn-danger btn-custom ml-2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Formulaire caché -->
            <form id="hiddenHomeUpdateForm" method="post" action="area_admin_homes_update.php" style="display:none;">
                <input type="hidden" name="id" id="hiddenHomeUpdateFormId">
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