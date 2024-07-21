<!-- Appel de l'area admin-->
<?php include_once "app/views/elements/employee_area.php"; ?>
<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_employee.php"; ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once "app/views/layouts/navbar.php"; ?>

    
    <?php
   // require_once 'app/controllers/Opinioncontroller.php';
    require_once __DIR__ . '/../controllers/Opinioncontroller.php';

    $controller = new OpinionController();
    $result = $controller->showPendingvisitorOpinions();
    ?>
    <body>
    
    <div class="container-fluid main-content py-5">
    <button class="btn btn-primary" id="menu-toggle">
        <>
    </button>
        <h1>Avis visiteurs en attente de validation</h1>
        <!-- Tableau Bootstrap -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-primary">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Avis</th>
                        <th scope="col">Statut avis</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)): ?>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['pseudo']); ?></td>
                                <td><?php echo htmlspecialchars($row['opinion']); ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td>
                                    <form action="opinionStatusUpdate" method="post" class="d-inline">
                                        <!-- Génération du token CSRF -->
                                        <?php include "app/controllers/handler/security_issuer.php"; ?>
                                        <input type="hidden" name="s_id" value="1">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($row['opinion_id']); ?>">
                                        <button type="submit" name="action" value="valider"
                                            class="btn btn-primary btn-sm">Valider</button>
                                    </form>
                                    <form action="opinionStatusUpdate" method="post" class="d-inline">
                                        <input type="hidden" name="s_id" value="0">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($row['opinion_id']); ?>">
                                        <button type="submit" name="action" value="rejeter"
                                            class="btn btn-danger btn-sm">Rejeter</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Aucun avis à valider</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Appel du footer -->
        <?php include "app/views/layouts/footer.php";?>

        <!-- Appel des scripts -->
        <?php include "app/views/layouts/scripts.php";?>
        <!-- Appel du script de la sidebar -->
        <script src="public/js/sidebar_script.js"></script>

    </div>

    </body>

    </html>