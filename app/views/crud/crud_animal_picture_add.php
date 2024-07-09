<!-- Appel de l'area admin-->
<?php include_once ("app/views/elements/admin_area.php"); ?>
<!-- Affichage de la sidebar -->
<?php include_once ("app/views/layouts/sidebar_admin.php"); ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once ("app/views/layouts/navbar.php"); ?>
    <br>
    <button class="btn btn-success mx-2" id="menu-toggle">
        <>
    </button>
    <body>
    <div class="container my-4">
                <h1>Insérer la nouvelle photo d'animal dans le répertoire dédié</h1>
                
                <form action="crudAnimalPictureHandler" method="post" enctype="multipart/form-data" class="mt-4">
                    <?php
                    
                    $animal_id = isset($_POST['animal_id']) ? htmlspecialchars($_POST['animal_id']) : '';
                    $animal_name = isset($_POST['animal_name']) ? htmlspecialchars($_POST['animal_name']) : '';
                    ?>
                    <div class="form-group">
                        <label for="animal_picture_name">Nom de l'animal:</label>
                        <input type="text" class="form-control" id="animal_picture_name" name="animal_picture_name" value="<?php echo htmlspecialchars($animal_name); ?>" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="picture">Sélectionnez une image:</label> <br><br>
                        <input type="file" class="form-control-file" id="picture" name="picture" accept=".jpg, .jpeg, .png, .gif" required>
                    </div>
                    <br>
                    <input type="hidden" id="animal_id" name="animal_id" value="<?php echo $animal_id; ?>">
                    
                    <button type="submit" name="submit_add_animal_picture" class="btn btn-primary">Télécharger</button>
                </form>
                    
    </div>
<!-- Appel du footer -->
        <?php include ("app/views/layouts/footer.php"); ?>
        <!-- Appel des scripts -->
        <?php include ("app/views/layouts/scripts.php"); ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
</body>
</html>
