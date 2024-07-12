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
    <div class="container mt-4">
        <h2>Contactez-nous</h2>
        <form action="app/controllers/handler/MailHandler.php" method="post">
            <!-- Génération du token CSRF -->
            <?php include "app/controllers/handler/security_issuer.php"; ?>
            <input type="hidden" name="csrf_token"
                value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" cols="50" rows="4" class="form-control"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="emailContact">Votre email :</label>
                <input type="email" id="emailContact" name="emailContact" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submitForm2">Envoyer</button>
        </form>
    </div>
    <br>
    <!-- Appel du footer -->
    <?php include "layouts/footer.php"; ?>
    <!-- Appel des scripts -->
    <?php include "layouts/scripts.php"; ?>
</body>

</html>