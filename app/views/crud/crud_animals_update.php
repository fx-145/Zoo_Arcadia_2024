<?php
require_once 'app/controllers/AnimalController.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/PictureController.php';


// Vérification si le formulaire a été soumis
if (isset($_POST['animal_id'])) {
    // Récupération des données du formulaire
    $animal_id = $_POST['animal_id'];

    // Création d'une instance du modèle animalModel
    $controller = new AnimalController();
    $result = $controller->getAnimalsWithId($animal_id);
    $animal_name = $result['animal_name'];
    $animal_race = $result['race'];
    $home_name = $result['home_name'];
    $current_home_id = $result['home_id'];

    // Récupère les habitats à afficher dans la barre déroulante de sélection
    $homeController = new HomeController();
    $data = $homeController->scrollBarHomeName();

    // Création d'une instance du modèle PictureModel pour afficher les photos de l'animal
    $controllerPics = new PictureController();
    $resultPics = $controllerPics->getAnimalPictures($animal_id);
}
?>

<!-- Appel de l'area admin -->
<?php include_once ("app/views/elements/admin_area.php"); ?>
<!-- Affichage de la sidebar -->
<?php include_once ("app/views/layouts/sidebar_admin.php"); ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once ("app/views/layouts/navbar.php"); ?>
    <br>

    <body>
        <button class="btn btn-success mx-2" id="menu-toggle">
            <>
        </button>
        <div class="container mt-4">
            <h1 class="mb-4">Modifier une fiche animal</h1>
            <form action="crudAnimalHandler" method="post">
                <input type="hidden" value="<?php echo $animal_id; ?>" id="animal_id" name="animal_id">
                <div class="form-group">
                    <label for="animal_name">Nom de l'animal à modifier:</label>
                    <input value="<?php echo htmlspecialchars($animal_name, ENT_QUOTES, 'UTF-8'); ?>" type="text"
                        class="form-control" id="animal_name" name="new_animal_name" required>
                </div>
                <div class="form-group">
                    <label for="animal_race">Race de l'animal à modifier:</label>
                    <input value="<?php echo htmlspecialchars($animal_race, ENT_QUOTES, 'UTF-8'); ?>" type="text"
                        class="form-control" id="animal_race" name="new_animal_race" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="current_home">Habitat actuel :</label><br>
                        <input value="<?php echo $home_name; ?>" type="text" class="form-control" id="current_home"
                            name="current_home" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="new_home_id">Habitat à modifier - Liste déroulante :</label>
                        <select name="new_home_id" id="new_home_id" class="form-control" required>

                            <?php
                            // Vérifier si $data est définie et non vide
                            if (isset($data) && !empty($data)) {
                                // Parcourir $data et créer une option pour chaque donnée
                                foreach ($data as $row): ?>
                                    <option value="<?= $row['home_id'] ?>"><?= $row['home_name'] ?></option>
                                <?php endforeach;
                            } else {
                                echo "<option value=''>Aucune donnée disponible</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit_update_animal">Modifier</button>
                        <a href="crud_animals" class="btn btn-secondary ml-2">Annuler</a>
            </form>
            <hr>
            <!-- Tableau Bootstrap affichage de toutes les photos des animals -->
            <h2 class="mt-4">Photos de l'animal</h2>
            <form action="crudanimalPictureHandler" method="post">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Photos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultPics as $row): ?>
                            <tr>
                                <td><img src="<?php echo "../../" . htmlspecialchars($row['animal_picture_path'], ENT_QUOTES, 'UTF-8'); ?>"
                                        alt="Photo de l'animal" class="img-fluid" width="200"></td>
                                <td>
                                    <input type="hidden" name="animal_id"
                                        value="<?php echo htmlspecialchars($animal_id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="animal_name"
                                        value="<?php echo htmlspecialchars($animal_name, ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="animal_picture_id"
                                        value="<?php echo htmlspecialchars($row['animal_picture_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="animal_picture_path"
                                        value="<?php echo htmlspecialchars($row['animal_picture_path'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <button type="submit" name="submit_delete_animal_picture"
                                        class="btn btn-danger">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
            <form action="crud_animal_picture_add" method="post" class="mt-2">
                <input type="hidden" name="animal_id"
                    value="<?php echo htmlspecialchars($animal_id, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="animal_name"
                    value="<?php echo htmlspecialchars($animal_name, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="btn btn-success">Ajouter Photo</button>
            </form>
        </div>
        <br>
        <!-- Appel du footer -->
        <?php include ("app/views/layouts/footer.php"); ?>
        <!-- Appel des scripts -->
        <?php include ("app/views/layouts/scripts.php"); ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
</div>
</body>

</html>