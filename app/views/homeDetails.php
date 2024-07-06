<?php
require_once 'app/controllers/handler/homeDetailsHandler.php';

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description_habitat</title>
    <link rel="stylesheet" href="../../public/css/main.css">
</head>


<body>
    <!-- Affichage de la navbar -->
    <?php
    include_once ("layouts/navbar.php")
    ?>

    <!-- Elements de la page habitats -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h2>Voici une description de cet habitat</h2>
                                <h4 class="mt-0 font-weight-bold mb-2"><?php if ($result) {
                                    // Parcourir le tableau mais s'arrêter à la première ligne, la description est unique,
                                    foreach ($result as $key => $row) {
                                        // Afficher seulement la première ligne
                                        if ($key === 0) {
                                            echo $row['home_name'];
                                            break; // Sortir de la boucle après avoir affiché la première ligne
                                        }
                                    }
                                } else {
                                    // Aucun enregistrement trouvé
                                    echo "Pas d'enregistrement";
                                } ?></h4>
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
                                                    echo $row['home_description'];
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
                                <h4 class="mt-0 font-weight-bold mb-2">Voici les animaux que vous pourrez y rencontrer
                                </h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result_pictures as $row): ?>
                                            <?php $row['animal_picture_path']; ?>
                                            <tr>
                                                <td>
                                                    <a
                                                        href="/animalDetails?animal_id=<?php echo urlencode($row['animal_id']); ?>"><?php echo $row['animal_name']; ?></a>
                                                </td>
                                                <td><img src="<?php echo $row['animal_picture_path']; ?>"
                                                        alt="Generic placeholder image" width="200"></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                    </li>
                </ul>
                <!-- Appel du footer -->
                <?php include ("layouts/footer.php"); ?>
                <!-- Appel des scripts -->
                <?php include ("layouts/scripts.php"); ?>
</body>
</html>