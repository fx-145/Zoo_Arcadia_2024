<!-- Cas de partage de la modification des services: Appel de l'area admin ou de l'area employe selon le $_session role-->
<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'administrateur') {
        include_once "app/views/elements/admin_area.php";
    } elseif ($_SESSION['role'] == 'employe') {
        include_once "app/views/elements/employee_area.php";
    } elseif (($_SESSION['role'] !== 'employe') || ($_SESSION['role'] !== 'administrateur')) {
        include_once "app/views/elements/employee_area.php";
    }

} else {
    //redirection pour un utilisateur sans rôle: va être reconduit vers la page de connexion
    include_once "app/views/elements/admin_area.php";
}
?>

<!-- Affichage de la sidebar -->
<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    // Vérifier si la variable 'role' est définie
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'administrateur') {
            include_once "app/views/layouts/sidebar_admin.php";
        } elseif ($_SESSION['role'] == 'employe') {
            include_once "app/views/layouts/sidebar_employee.php";
        }
    }
}