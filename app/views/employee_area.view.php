<!-- Appel de l'area employee-->
<?php include_once "elements/employee_area.php"; ?>

<body>
    <!-- Affichage de la sidebar -->
    <?php
    include_once "app/views/layouts/sidebar_employee.php"; ?>
    <!-- Affichage de la navbarbar -->
    <div id="content">
        <?php include_once "app/views/layouts/navbar.php"; ?>
        <div class="container-fluid main-content py-5">
        <button class="btn btn-primary" id="menu-toggle">
                <>
            </button>
            <h1 class="mt-4">Espace Employé</h1> 
            <p>Bienvenue sur votre espace <span style="margin-left: 5px;"></span></p>
        </div>
        <!-- Appel du footer -->
        <?php include "layouts/footer.php"; ?>
        <!-- Appel des scripts -->
        <?php include "layouts/scripts.php"; ?>
        <!-- Appel du script de la sidebar -->
        <script src="../../public/js/sidebar_script.js"></script>
    </div>
</body>
</html>