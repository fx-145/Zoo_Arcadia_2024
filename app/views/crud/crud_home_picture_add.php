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
        <div class="container my-4">
            <h1>Insérer la nouvelle photo d'habitat dans le répertoire dédié</h1>

            <form action="crudHomePictureHandler" method="post" enctype="multipart/form-data" class="mt-4">
                <?php
                // Assurez-vous que $home_id et $home_name sont définis en fonction des données POST
                $home_id = isset($_POST['home_id']) ? htmlspecialchars($_POST['home_id']) : '';
                $home_name = isset($_POST['home_name']) ? htmlspecialchars($_POST['home_name']) : '';
                ?>
                <div class="form-group">
                    <label for="home_picture_name">Nom de l'habitat:</label>
                    <input type="text" class="form-control" id="home_picture_name" name="home_picture_name"
                        value="<?php echo htmlspecialchars($home_name); ?>" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label for="picture">Sélectionnez une image:</label> <br><br>
                    <input type="file" class="form-control-file" id="picture" name="picture"
                        accept=".jpg, .jpeg, .png, .gif" required>
                </div>
                <br>
                <input type="hidden" id="home_id" name="home_id" value="<?php echo $home_id; ?>">

                <button type="submit" name="submit_add_home_picture" class="btn btn-primary">Télécharger</button>
            </form>

        </div>
        <!-- Appel du footer -->
        <?php include "app/views/layouts/footer.php"; ?>
        <!-- Appel des scripts -->
        <?php include "app/views/layouts/scripts.php"; ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
    </body>

    </html>