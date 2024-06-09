<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../../public/css/main.css">
</head>
<body>

    <div class="container mt-4">
    <h2>Contactez-nous</h2>
    <form method="post">
        <div>
            <label for="titre">Titre :</label><br>
            <input type="text" id="titre" name="titre" required><br>
        </div>

        <div>
            <label for="description">Description :</label><br>
            <textarea id="description" name="description" cols="50" rows="4" required></textarea><br><br>
        </div>

        <div>
            <label for="emailContact">Votre email :</label><br>
            <input type="email" id="emailContact" name="emailContact" required><br><br>
        </div>
        
        <input type="submit" class="btn btn-primary" name="submit_form1"value="Envoyer"><br><br>
    </form>
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