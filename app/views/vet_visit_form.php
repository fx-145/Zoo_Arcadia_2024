<?php
require_once 'app/controllers/AnimalController.php';
$controllerA = new AnimalController();
// Rechercher les noms des animaux à afficher dans le champ animaux:
$data = $controllerA->scrollBarAnimalName();
?>
<!-- Appel de l'area vet-->
<?php include_once "app/views/elements/vet_area.php"; ?>
<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_vet.php"; ?>
<!-- Affichage de la navbar -->
<div id="content">
  <?php include_once "app/views/layouts/navbar.php"; ?>

  <body>
  <div id="content" class="main-content">
  <div class="container-fluid py-5">
    <h1 class="mt-4">Espace Vétérinaire</h1>
    <button class="btn btn-primary" id="menu-toggle">
      <>
    </button>
    <p>Formulaire de visite des animaux</p>
    <div class="row">
      <!-- Première carte : Formulaire de visite des animaux -->
      <div class="col-lg-6 mb-4">
        <div class="card h-100 bg-light">
          <div class="card-body">
            <h3 class="card-title">Relevé de passage Vétérinaire</h3>
            <form action="app/controllers/handler/vet_visit_handler.php" method="post">
              <!-- Génération du token CSRF -->
              <?php include "app/controllers/handler/security_issuer.php"; ?>
              <!-- Sélectionner l'animal par son nom-->
              <div class="form-group col-md-4">
                <label for="animal_name">Sélectionnez un animal :</label>
                <select name="animal_name" id="animal_name" class="form-control" required>
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
              <!-- Type de nourriture proposée-->
              <div class="form-group col-md-4">
                <label for="type_of_food_proposed">Type de nourriture recommandée:</label>
                <input type="text" name="type_of_food_proposed" class="form-control" required />
              </div>
              <br>
              <!-- Quantité de nourriture proposée avec virgule-->
              <div class="form-group col-md-4">
                <label for="qty_of_food_proposed">Quantité de nourriture recommandée (g) (chiffre à virgule):</label>
                <input type="number" step="0.01" id="qty_of_food_proposed" name="qty_of_food_proposed"
                  pattern="[0-9]+([,\.][0-9]+)?" title="Entrez un nombre entier ou décimal valide"
                  class="form-control" required>
              </div>
              <br>
              <!-- Date saisie des données-->
              <div class="form-group col-md-4">
                <label for="date">Date de saisie</label>
                <input type="date" name="date" class="form-control" required />
              </div>
              <br>
              <!-- Etat de l'animal: choix entre très bon, bon, moyen, Mauvais, Très mauvais  -->
              <div class="form-group col-md-6">
                <label>Etat de l'animal</label>
                <div class="form-check">
                  <input type="radio" name="animal_condition" value="Très bon" class="form-check-input" required>
                  <label class="form-check-label">Très bon</label>
                </div>
                <div class="form-check">
                  <input type="radio" name="animal_condition" value="Bon" class="form-check-input" required>
                  <label class="form-check-label">Bon</label>
                </div>
                
                <div class="form-check">
                  <input type="radio" name="animal_condition" value="Moyen" class="form-check-input" required>
                  <label class="form-check-label">Moyen</label>
                </div>
                
                <div class="form-check">
                  <input type="radio" name="animal_condition" value="Mauvais" class="form-check-input" required>
                  <label class="form-check-label">Mauvais</label>
                </div>
                
                <div class="form-check">
                  <input type="radio" name="animal_condition" value="Très mauvais" class="form-check-input" required>
                  <label class="form-check-label">Très Mauvais</label>
                </div>
              </div>
              <br>
              <!-- Détail de l'état de l'animal-->
              <div class="form-group col-md-6">
                <label for="animal_condition_detail">Détails sur l'état de l'animal</label>
                <textarea name="animal_condition_detail" id="animal_condition_detail" cols="50" rows="4"
                  class="form-control" required></textarea>
              </div>
              <!-- Détail de l'état de l'habitat de l'animal-->
              <div class="form-group col-md-6">
                <label for="home_condition">Etat de l'habitat</label>
                <textarea name="home_condition" id="home_condition" cols="50" rows="4"
                  class="form-control"></textarea>
              </div>
              <br>
              <!-- Bouton envoyer les données-->
              <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Deuxième carte : Employee Reports -->
      <div class="col-lg-6 mb-4">
        <div class="card h-100 bg-light">
          <div class="card-body">
            <h3 class="card-title">Rapports des employés</h3>
            <?php include 'employee_reports_for_vets.php'; ?>
          </div>
        </div>
      </div>
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
    <script src="public/js/filter_by_animal_name.js"></script>
  </body>

  </html>