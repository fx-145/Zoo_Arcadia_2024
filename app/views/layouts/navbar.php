<?php
//en fonction du clic sur un item de la navbar, activation du router
require_once __DIR__ . '/../../controllers/router/Router.controller.php';
$navbar = new Navbar();
//mise en surbrillance du lien de la navbar si le lien est actif

?>

<!-- Affichage de la barre de navigation avec Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <!-- Bouton de toggler pour le menu burger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Marque de la navbar (Zoo Arcadia) -->
        <a class="navbar-brand" href="/">Zoo Arcadia</a>
        <?php
        // Définir la page actuelle
        $currentPage = basename($_SERVER['PHP_SELF'], ".php");

        // Définir les pages publiques
        $publicPages = [
            'index' => 'Accueil',
            'services' => 'Services',
            'homes' => 'Habitats',
            'contact' => 'Contact',
            'connection' => 'Connexion',
            
        ];

        // Définir les pages selon le rôle
        $adminPages = ['admin_area', 'vet_reports_for_admin', 'crud_homes', 'crud_homes_update', 'crud_homes_add', 'crud_home_picture_add', 'crud_animals', 'crud_animals_update', 'crud_animals_add', 'crud_animal_picture_add', 'crud_services', 'crud_services_update', 'crud_services_add', 'crud_opening_hours', 'crud_opening_hours_update', 'register','animal_views'];
        $vetPages = ['vet_area', 'employee_reports_for_vets', 'vet_visit_form'];
        $employeePages = ['employee_area', 'employee_food_form', 'crud_services', 'crud_services_update', 'employee_validation_opinion'];
        ?>

        <?php //Pages enfants de "Habitats"
        $habitatsSubPages = ['homeDetails','animal_details'];
        ?>

        <!-- Contenu de la navbar : liens et menus -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto">
                <!-- Liens de la navbar pour les pages publiques -->
                <?php
                foreach ($publicPages as $page => $title) {
                    $activeClass = ($currentPage === $page || ($page === 'index' && $currentPage === '') || ($page === 'homes' && in_array($currentPage, $habitatsSubPages))) ? 'active' : '';
                    echo '<li class="nav-item ' . $activeClass . '">';
                    echo '<a class="nav-link ' . $activeClass . '" href="/' . ($page === 'index' ? '' : $page) . '">' . $title . '</a>';
                    echo '</li>';
                }

                // Affichage du lien selon le rôle de l'utilisateur
                if (isset($_SESSION['role'])) {
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