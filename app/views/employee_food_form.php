<?php
require_once 'app/controllers/AnimalController.php';
$controllerA = new AnimalController();
// Rechercher les noms des animaux à afficher dans le champ animaux:
$data = $controllerA->scrollBarAnimalName();
?>
<!-- Appel de l'area employee-->
<?php include_once "app/views/elements/employee_area.php"; ?>

<body>
    <!-- Affichage de la sidebar -->
    <?php
    include_once "app/views/layouts/sidebar_employee.php"; ?>
    <!-- Affichage de la navbarbar -->
    <div id="content">
        <?php include_once "app/views/layouts/navbar.php"; ?>
       
<div id="content" class="main-content">
    <div class="container-fluid py-5">
    <button class="btn btn-primary" id="menu-toggle">
            <>
        </button>
        <h1 class="mt-4">Espace Employé</h1>
        
        <p>Formulaire d'alimentation des animaux <span style="margin-left: 5px;"></span></p>
        <div class="container-fluid py-5 main-content">
            <h1>Relevé de passage Employé</h1>
            <form action="app/controllers/handler/employee_report_handler.php" method="post">
                <!-- Génération du token CSRF -->
                <?php include "app/controllers/handler/security_issuer.php"; ?>
                <!-- Sélectionner l'animal par son nom -->
                <div class="form-group text-center col-md-2">
                    <label for="animal_name">Sélectionnez un animal :</label>
                    <select class="form-control" name="animal_name" id="animal_name" required>
                        <?php
                        if (isset($data) && !empty($data)) {
                            foreach ($data as $row): ?>
                                <option value="<?= $row['animal_name'] ?>"><?= $row['animal_name'] ?></option>
                            <?php endforeach;
                        } else {
                            echo "<option value=''>Aucune donnée disponible</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <!-- Type de nourriture donnée -->
                <div class="form-group col-md-2">
                    <label for="type_of_food_given">Type de nourriture donnée :</label>
                    <input type="text" class="form-control" id="type_of_food_given" name="type_of_food_given" required>
                </div>
                <br>
                <!-- Quantité de nourriture donnée (avec virgule) -->
                <div class="form-group col-md-2">
                    <label for="qty_of_food_given">Quantité de nourriture donnée (grammes) (chiffre à virgule) :</label>
                    <input type="number" step="0.01" class="form-control" id="qty_of_food_given"
                        name="qty_of_food_given" pattern="[0-9]+([,\.][0-9]+)?"
                        title="Entrez un nombre entier ou décimal valide" required>
                </div>
                <br>
                <!-- Date et heure de saisie des données -->
                <div class="form-group col-md-2">
                    <label for="date_time">Date et heure de saisie :</label>
                    <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
                </div>
                <br>
                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </div>
    </div>
        <!-- Appel du footer -->
        <?php include "app/views/layouts/footer.php";
        ; ?>
        <!-- Appel des scripts -->
        <?php include "app/views/layouts/scripts.php"; ?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>
    </div>
</body>

</html>