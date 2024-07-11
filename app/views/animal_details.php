<?php
require_once 'app/controllers/AnimalController.php';
require_once 'app/controllers/ViewController.php';

session_start();

if (isset($_SESSION['animal_id'])) {
    $animal_id = $_SESSION['animal_id'];

    // Supprimer l'animal_id de la session si nécessaire
     unset($_SESSION['animal_id']);

    // Récupérer toutes les photos et la condition de l'animal pour affichage
    $controller = new AnimalController();
    $result = $controller->getOneAnimalAndAllPictures($animal_id);
    $result_condition = $controller->getAnimalCondition($animal_id);
} else {
    header("Location: homes");
    exit(); // fin de script
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
    <!-- Affichage de la navbar -->
    <?php
    include_once ("layouts/navbar.php")
        ?>

    <div class="container py-5">



        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- List group-->
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h2 class="mt-0 font-weight-bold mb-2"><?php ?></h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result) {
                                            // Parcourir le tableau mais s'arrêter à la première ligne, la description est unique,
                                        
                                            foreach ($result as $key => $row) {
                                                // Afficher seulement la première ligne
                                                if ($key === 0) {
                                                    echo '<h1>' . htmlspecialchars($row['animal_name']) . '</h1>';
                                                    break; // Sortir de la boucle après avoir affiché la première ligne
                                                }
                                            }
                                        } else {
                                            // Aucun enregistrement trouvé
                                            echo "Pas d'enregistrement";
                                        } ?>
                                    </tbody>
                                </table>
                    </li>
                    <!-- list group item-->
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h2 class="mt-0 font-weight-bold mb-2"><?php ?></h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result) {
                                            // Parcourir le tableau mais s'arrêter à la première ligne, la description est unique,
                                        
                                            foreach ($result as $key => $row) {
                                                // Afficher seulement la première ligne
                                                if ($key === 0) {
                                                    echo '<h2>' . htmlspecialchars($row['race']) . '</h2>';
                                                    break; // Sortir de la boucle après avoir affiché la première ligne
                                                }
                                            }
                                        } else {
                                            // Aucun enregistrement trouvé
                                            echo "Pas d'enregistrement";
                                        } ?>
                                    </tbody>
                                </table>
                    </li>

                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h4 class="mt-0 font-weight-bold mb-2">Voici pour le reconnaître</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $row): ?>
                                            <?php $row['animal_picture_path']; ?>
                                            <tr>
                                                <td><img src="<?php echo "../../" . $row['animal_picture_path']; ?>"
                                                        alt="Generic placeholder image" width="200"></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                    </li>

                    <!-- list group item-->
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h4 class="mt-0 font-weight-bold mb-2"><?php ?> Comment va notre ami? Voici ce qu'en
                                    pense notre équipe de vétérinaires</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result_condition) {
                                            // Parcourir le tableau mais s'arrêter à la première ligne, la description est unique,
                                        
                                            foreach ($result_condition as $key => $row) {
                                                // Afficher seulement la première ligne
                                                if ($key === 0) {
                                                    echo $row['animal_condition'];

                                                    break; // Sortir de la boucle après avoir affiché la première ligne
                                                }
                                            } ?><br><br>
                                            <?php
                                            foreach ($result_condition as $key => $row) {
                                                // Afficher seulement la première ligne
                                                if ($key === 0) {

                                                    echo $row['animal_condition_detail'];
                                                    break; // Sortir de la boucle après avoir affiché la première ligne
                                                }
                                            }




                                        } else {
                                            // Aucun enregistrement trouvé
                                            echo "Pas d'enregistrement";
                                        } ?>
                                    </tbody>
                                </table>
                    </li>





                </ul>
                <!-- Appel du footer -->
                <?php include "layouts/footer.php"; ?>

                <!-- Appel des scripts -->
                <?php include "layouts/scripts.php"; ?>

</body>

</html>