<!-- Appel de l'area admin -->
<?php include_once "app/views/elements/admin_area.php"; ?>

<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_admin.php"; ?>

<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>

   

    <body>
        <title>Ajouter un habitat</title>
       
        <div class="container-fluid py-5 main-content">
        <button class="btn btn-primary" id="menu-toggle">
        <>
    </button>
            <h1>Ajouter un nouveau Service</h1>
            <form action="crudServiceHandler" method="post">
                <!-- Génération du token CSRF -->
                <?php include "app/controllers/handler/security_issuer.php"; ?>
                <div class="form-group col-md-2">
                    <label for="service_name">Nom du nouveau service:</label>
                    <input type="text" class="form-control" id="service_name" name="service_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="service_description">Description:</label>
                    <textarea class="form-control" id="service_description" name="service_description" rows="4"
                        required></textarea>
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="submit_add_service">Ajouter</button>
                <a href="crud_services" class="btn btn-secondary">Annuler</a>
            </form>
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