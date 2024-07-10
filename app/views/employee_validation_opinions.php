<!-- Appel de l'area admin-->
<?php include_once ("app/views/elements/employee_area.php"); ?>
<!-- Affichage de la sidebar -->
<?php include_once ("app/views/layouts/sidebar_employee.php"); ?>
<!-- Affichage de la navbar -->
<div id="content">
    <?php include_once ("app/views/layouts/navbar.php"); ?>
    <br>
    <button class="btn btn-success mx-2" id="menu-toggle">
        <>
    </button>


    <?php

    //require_once 'app/controllers/router/Router.controller.php';
    require_once 'app/controllers/Opinioncontroller.php';
    //$navbar = new Navbar();
    $controller = new OpinionController();
    $result = $controller->showPendingvisitorOpinions();


    ?>

    <div class="container-fluid">
        <h1>Avis visiteurs en attente de validation</h1>


        <!-- Tableau Bootstrap -->
        <table class="table">
            <thead>
                <tr>
                    <th>id visitor</th>
                    <th>pseudo</th>
                    <th>Avis</th>
                    <th>Statut avis
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)): ?>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo $row['opinion_id']; ?></td>
                            <td><?php echo $row['pseudo']; ?></td>
                            <td><?php echo $row['opinion']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="opinionStatusUpdate?s_id=<?php echo "1"; ?>&id=<?php echo $row['opinion_id']; ?>"
                                    class="btn btn-success">Valider</a>
                                <a href="opinionStatusUpdate?s_id=<?php echo "0"; ?>&id=<?php echo $row['opinion_id']; ?>"
                                    class="btn btn-danger">Rejeter</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucun avis à valider</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Appel du footer -->
        <?php include ("app/views/layouts/footer.php"); ?>

        <!-- Appel des scripts -->
        <?php include ("app/views/layouts/scripts.php"); ?>
        <!-- Appel du script de la sidebar -->

        <script src="public/js/sidebar_script.js"></script>

    </div>

    </body>

    </html>