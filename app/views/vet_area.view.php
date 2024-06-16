<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Veterinaire</title>
    <link rel="stylesheet" href="../../public/css/sidebar_style.css">
    <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
    <!-- Affichage de la sidebar -->
    <?php
    include_once ("layouts/sidebar_vet.php"); ?>
    <!-- Affichage de la navbarbar -->
    <div id="content">

        <?php include_once ("layouts/navbar.php"); ?>
       
        

        <div class="container-fluid">

            <h1 class="mt-4">Espace Vétérinaire</h1>
            <button class="btn btn-success mx-2" id="menu-toggle"><></button>
            <p>Bienvenue sur votre espace <span style="margin-left: 5px;"></span></p>
            
        </div>






        
        <!-- Appel du footer -->
        <?php include ("layouts/footer.php"); ?>

        <!-- Appel des scripts -->
        <?php include ("layouts/scripts.php"); ?>
        <!-- Appel du script de la sidebar -->
        <script src="../../public/js/sidebar_script.js"></script>

        <!-- cette cloture de div ci-dessous balise la fin du contenu de tout l'affichage dans area_admin -->
    </div>

</body>

</html>