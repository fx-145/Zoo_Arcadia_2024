<?php
session_start(); ?>
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
    <?php include_once "layouts/navbar.php" ?>
     <!-- Contenu principal avec classe main-content -->
     <div class="container-fluid main-content py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Contactez-nous</h2>

                <!-- Formulaire de contact <form action="app/controllers/handler/MailHandler.php" method="post">-->
                <form action="app/controllers/handler/MailHandler.php" method="post">
                    <!-- Génération du token CSRF -->
                    <?php include "app/controllers/handler/security_issuer.php"; ?>
                    

                    <!-- Champ Titre -->
                    <div class="form-group col-md-4">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre" class="form-control" required>
                    </div>

                    <!-- Champ Description -->
                    <div class="form-group col-md-6">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" cols="50" rows="4"
                            class="form-control" required></textarea>
                    </div>

                    <!-- Champ Email -->
                    <div class="form-group col-md-2">
                        <label for="emailContact">Votre email :</label>
                        <input type="email" id="emailContact" name="emailContact" class="form-control" required>
                    </div>
                    <br>
                    <!-- Bouton Envoyer -->
                    <button type="submit" class="btn btn-primary btn-block" name="submitForm2">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Appel du footer -->
    <?php include "layouts/footer.php"; ?>
    <!-- Appel des scripts -->
    <?php include "layouts/scripts.php"; ?>
</body>

</html>