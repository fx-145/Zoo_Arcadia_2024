<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../public/css/main.css">
</head>
<body>
<div>
    

    <!-- formulaire de connexion  -->
    <div class="container mt-4">
    <h1> FORMULAIRE DE CONNEXION UTILISATEUR </h1>
    <h5> <em>(Réservé au personnel du zoo)</em></h5>
    <br>
    <h4> Merci de renseigner votre login et votre mot de passe</h4>
    <br>
    <form method="POST">
        <!-- EMAIL -->
        <div class="form-group">
        <label for="email">Adresse email :</label>
        <input type="email" name="email" required /> <br><br>
        </div>

        <!-- PASSWORD -->
        <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required /> <br><br>
        </div>
        <!-- BUTTON -->
        <input type="submit" class="btn btn-primary" value="Se connecter" />
    </form>
</div>
</div>
</body>
<br>
<br>


<div>
    
</div>
 <!-- Appel du footer -->
 <?php include_once ("layouts/footer.php"); ?>

<!-- appel du script bootstrap  -->
<script src="../../public/js/jquery-3.5.1.slim.min.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>
<script src="../../public/js/bootstrap.bundle.min.js"></script>
<script src="../../public/js/popper.min.js"></script>


</body>
</html>