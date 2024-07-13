<?php
require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/AnimalController.php';
$controller = new AnimalController();
$result = $controller->getAllAnimalWithHomes();
?>


<!-- Appel de l'area admin-->
<?php include_once "app/views/elements/admin_area.php"; ?>
<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_admin.php"; ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>
   

    <body>
        <div class="container-fluid py-5 main-content">
        <button class="btn btn-primary" id="menu-toggle">
        <>
    </button>
            <h1 class="mb-4">Edition des animaux</h1>
            <!-- affichage de tous les habitats -->
            <div class="table-responsive">
    <table class="table table-striped table-bordered table-primary">
        <thead class="thead-dark text-center">
            <tr>
                <th>Nom</th>
                <th>Race</th>
                <th>Habitat</th>
                <th class="col-action">Modifier</th>
                <th class="col-action">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['animal_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['race'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['home_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="col-action">
                        <form action="crud_animals_update" method="POST" class="d-inline">
                            <!-- Génération du token CSRF -->
                            <?php include "app/controllers/handler/security_issuer.php"; ?>
                            <input type="hidden" name="animal_id"
                                value="<?php echo htmlspecialchars($row['animal_id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <button type="submit" name="submit_update_animal"
                                class="btn btn-primary btn-custom mr-2">Modifier</button>
                        </form>
                    </td>
                    <td class="col-action">
                        <form action="crudAnimalHandler" method="POST" class="d-inline">
                            <!-- Génération du token CSRF -->
                            <?php include "app/controllers/handler/security_issuer.php"; ?>
                            <input type="hidden" name="animal_id"
                                value="<?php echo htmlspecialchars($row['animal_id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <button type="submit" name="submit_delete_animal"
                                class="btn btn-danger btn-custom ml-2">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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