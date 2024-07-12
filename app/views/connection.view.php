<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
    <!-- Affichage de la navbar -->
    <?php
    include_once 'layouts/navbar.php';
    ?>
    <!-- formulaire de connexion  -->
    <div class="container mt-4">
        <h1> FORMULAIRE DE CONNEXION UTILISATEUR </h1>
        <h5> <em>(Réservé au personnel du zoo)</em></h5>
        <br>
        <h4> Merci de renseigner votre login et votre mot de passe</h4>
        <br>
        <form action="app/controllers/handler/loginHandler.php" method="POST">
            <!-- Génération du token CSRF -->
            <?php include "app/controllers/handler/security_issuer.php"; ?>
            <!-- EMAIL -->
            <div class="form-group">
                <label for="userName">Adresse email :</label>
                <input type="email" id="userName" name="userName" class="form-control" required>
            </div>
            <br>
            <!-- PASSWORD -->
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <br>
            <!-- BUTTON -->
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
    </div>
</body>
<br>
<br>
<div>
</div>
<!-- Appel du footer -->
<?php include "layouts/footer.php"; ?>
<!-- Appel des scripts -->
<?php include "layouts/scripts.php"; ?>
</body>

</html>