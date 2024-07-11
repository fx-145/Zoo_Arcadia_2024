<?php
//require_once '../Controller/ViewsController.php';

require_once 'config.php';
require_once APP_CONTROLLER_PATH . '/ViewController.php';

$controller = new ViewController();
$result = $controller->getAnimalViews();
?>



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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

<body>
<h1>Nombre de vues </h1>
<div>
<div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Animaux vus</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom de l'animal</th>
                        <th>Race</th>
                        <th>Nombre de vues</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['animal_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['race']); ?></td>
                            <td><?php echo htmlspecialchars($row['views']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
    <?php if (empty($result)) {
  echo 'pas d\'enregistrements';
}?>
<br>
    <a href="resetViewsHandler" class="btn btn-danger">réinitialiser</a>
    </div>
</div>
<br>
<!-- Appel du footer -->
<?php include "layouts/footer.php"; ?>

<!-- Appel des scripts -->
<?php include "layouts/scripts.php"; ?>
<!-- Appel du script de la sidebar -->
<script src="../../public/js/sidebar_script.js"></script>

</body>

</html>