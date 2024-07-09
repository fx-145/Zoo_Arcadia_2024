<!-- Appel de l'area admin -->
<?php include_once("app/views/elements/admin_area.php"); ?>
    <!-- Affichage de la sidebar -->
    <?php include_once("app/views/layouts/sidebar_admin.php"); ?>
    <!-- Affichage de la navbar -->
    <div id="content">
        <?php include_once("app/views/layouts/navbar.php"); ?>
    <title>Ajouter un habitat</title>
    
<body>
    <br>
<button class="btn btn-success mx-2" id="menu-toggle"><></button>
    <div class="container mt-4">
        <h1>Ajouter un nouvel habitat</h1>
        <form action="crudHomeHandler" method="post">
            <div class="form-group">
                <label for="home_name">Nom du nouvel habitat:</label>
                <input type="text" class="form-control" id="home_name" name="home_name" required>
            </div>
            <div class="form-group">
                <label for="home_description">Description:</label>
                <textarea class="form-control" id="home_description" name="home_description" rows="4" required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit_add_home">Ajouter</button>
            <a href ="crud_homes" class= "btn btn-secondary">Annuler</a>
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
