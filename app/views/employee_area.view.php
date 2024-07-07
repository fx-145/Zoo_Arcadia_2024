        
        <!-- Appel de l'area employee-->
         <?php include_once ("elements/employee_area.php"); ?>
         <body>
    <!-- Affichage de la sidebar -->
    <?php
    include_once ("app/views/layouts/sidebar_employee.php"); ?>
    <!-- Affichage de la navbarbar -->
    <div id="content">

        <?php include_once ("app/views/layouts/navbar.php"); ?>
       
        

        <div class="container-fluid">

            <h1 class="mt-4">Espace Employé</h1>
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