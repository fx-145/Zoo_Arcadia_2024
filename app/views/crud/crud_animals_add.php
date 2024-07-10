<?php

require_once 'app/controllers/HomeController.php';


 //Récupère les habitats à afficher dans la barre déroulante de sélection
 $homeController = new HomeController();
 $data =$homeController->scrollBarHomeName(); 
?>



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
    <h1>Ajouter un nouvel Animal</h1>
    <form action="crudAnimalHandler" method="post">
            <div class="form-group">
                <label for="animal_name">Nom du nouvel animal:</label>
                <input type="text" class="form-control" id="animal_name" name="animal_name" required>
            </div>
            <div class="form-group">
                <label for="animal_race">Race:</label>
                <input type="text" class="form-control" id="animal_race" name="animal_race" required>
            </div>
            <div class="form-group">
            <label for="new_home_id">Habitat à ajouter - Liste déroulante :</label>
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
        </div>
                <br>

            <button type="submit" class="btn btn-primary" name="submit_add_animal">Ajouter</button>
            <a href ="crud_animals" class= "btn btn-secondary">Annuler</a>
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
