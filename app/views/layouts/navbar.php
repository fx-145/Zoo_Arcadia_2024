<?php
//en fonction du clic sur un item de la navbar, activation du router
require_once 'app/controllers/router/Router.controller.php';
$navbar = new Navbar();
?>

<!-- Affichage de la barre de navigation avec Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php

                //mise en surbrillance du lien de la navbar si le lien est actif
                $currentPage = basename($_SERVER['PHP_SELF']);

                // (code special pour la page index.view)
                $isHomePage = $currentPage === '' || $currentPage === 'index.php';

                echo $isHomePage ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Accueil</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>';

                echo ($currentPage === 'services') ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/services">Services</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/services">Services</a></li>';

                echo ($currentPage === 'homes') ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/homes">Habitats</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/homes">Habitats</a></li>';

                echo ($currentPage === 'connection') ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/connection">Connexion</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/connection">Connexion</a></li>';

                echo ($currentPage === 'contact') ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/contact">Contact</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>';


                if (isset($_SESSION['role'])) {
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    $adminPages = ['admin_area', 'vet_reports_for_admin','crud_homes','crud_homes_update','crud_homes_add','crud_home_picture_add','crud_animals','crud_animals_update','crud_animals_add','crud_animal_picture_add','crud_services','crud_services_update','crud_services_add','crud_opening_hours','crud_opening_hours_update'];
                    $vetPages = ['vet_area', 'employee_reports_for_vets','vet_visit_form'];
                    $employeePages = ['employee_area', 'employee_food_form','crud_services','crud_services_update'];

                    switch ($_SESSION['role']) {
                        case 'administrateur':
                            $isAdminPage = in_array($currentPage, $adminPages);
                            echo $isAdminPage ?
                                '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/admin_area">Espace Admin</a></li>' :
                                '<li class="nav-item"><a class="nav-link" href="/admin_area">Espace Admin</a></li>';
                            break;

                        case 'veterinaire':
                            $isVetPage = in_array($currentPage, $vetPages);
                            echo $isVetPage ?
                                '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/vet_area">Espace Vétérinaire</a></li>' :
                                '<li class="nav-item"><a class="nav-link" href="/vet_area">Espace Vétérinaire</a></li>';
                            break;

                        case 'employe':
                            $isEmployeePage = in_array($currentPage, $employeePages);
                            echo $isEmployeePage ?
                                '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/employee_area">Espace Employé</a></li>' :
                                '<li class="nav-item"><a class="nav-link" href="/employee_area">Espace Employé</a></li>';
                            break;
                    }
                }
                ?>




            </ul>
        </div>
    </div>
</nav>