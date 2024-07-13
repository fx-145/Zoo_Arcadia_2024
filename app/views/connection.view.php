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
    
    <!-- formulaire de connexion avec classe main-content -->
    <div class="container-fluid main-content py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Formulaire de connexion utilisateur</h1>
            <h5 class="text-center mb-4"><em>(Réservé au personnel du zoo)</em></h5>

            <!-- Formulaire de connexion -->
            <form action="app/controllers/handler/loginHandler.php" method="POST">
                <!-- Génération du token CSRF -->
                <?php include "app/controllers/handler/security_issuer.php"; ?>

                <!-- Champ EMAIL -->
                <div class="form-group text-center">
                    <label for="userName">Adresse email :</label>
                    <input type="email" id="userName" name="userName" class="form-control mx-auto" style="max-width: 300px;" required>
                </div>
                <br>
                <!-- Champ MOT DE PASSE -->
                <div class="form-group text-center">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control mx-auto" style="max-width: 300px;" required>
                </div>
                <br>
                <!-- Bouton DE CONNEXION -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="max-width: 200px;">Se connecter</button>
                </div>
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