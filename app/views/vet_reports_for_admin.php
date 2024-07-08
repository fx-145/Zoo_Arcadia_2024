<?php
require_once 'app/controllers/VetController.php';

$controller = new VetController();
$result = $controller->getVetReports();
?>

  <!-- Appel de l'area admin-->
  <?php include_once("app/views/elements/admin_area.php"); ?>
  <!-- Affichage de la sidebar -->
  <?php include_once("app/views/layouts/sidebar_admin.php"); ?>
  <!-- Affichage de la navbar -->
  <div id="content">
    <?php include_once("app/views/layouts/navbar.php"); ?>


<body>

  <!-- Ajouter un service -->
  <div class="container">
  <button class="btn btn-success mx-2" id="menu-toggle"><></button>
    <h1>Rapports des vétérinaires</h1>


     <!--installer les filtres sur animal et date de rapport -->
    <button id="sortByDateAscBtn">Trier par date croissante</button>
    <button id="sortByDateDescBtn">Trier par date décroissante</button>
    <button id="sortByNameAscBtn">Trier par nom d'animal croissant</button>
    <button id="sortByNameDescBtn">Trier par nom d'animal décroissant</button>



    <div id="tableContainer">
    <table class="table">
      <thead>
        <tr>

          <th col-index= 1> Date de rapport
            <select class="table-filter">
          </th>
          <option value="all"></option></select></th>
          <th col-index= 2>Nom de l'animal
            <select class="table-filter">
          </th>
          <option value="all"></option></select></th>
          </th>
          <th>Type de nourriture proposé (g)</th>
          <th>Poids de nourriture proposé (g)</th>
          <th>Etat de l'animal</th>
          <th>Description de l'état de l'animal</th>
          <th>Username du vétérinaire</th>
        </tr>

       
        <tr>

        <!--  affichage de tous les champs, croisées de 3 tables (récupère username et animal_name) -->
      </thead>
      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?php echo $row['vet_passage_date']; ?></td>
            <td><?php echo $row['animal_name']; ?></td>
            <td><?php echo $row['type_of_food_proposal']; ?></td>
            <td><?php echo $row['food_weight_proposal']; ?></td>
            <td><?php echo $row['animal_condition']; ?></td>
            <td><?php echo $row['animal_condition_detail']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>



<!-- Appel du footer -->
<?php include ("app/views/layouts/footer.php"); ?>

<!-- Appel des scripts -->
<?php include ("app/views/layouts/scripts.php"); ?>
<!-- Appel du script de la sidebar -->

<script src="public/js/sidebar_script.js"></script>
<script src="public/js/table_order.js"></script>
<script src="public/js/table_filter.js"></script>

</div>
</body>
</html>