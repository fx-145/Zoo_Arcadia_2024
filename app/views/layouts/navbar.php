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
                echo ($navbar->urlValue('/')) ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Accueil</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>';


                echo ($navbar->urlValue('/services')) ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/services">Services</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/services">Services</a></li>';

                echo ($navbar->urlValue('/homes')) ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/homes">Habitats</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/homes">Habitats</a></li>';

                echo ($navbar->urlValue('/connection')) ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/connection">Connexion</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/connection">Connexion</a></li>';

                echo ($navbar->urlValue('/contact')) ?
                    '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/contact">Contact</a></li>' :
                    '<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>';


                ?>
            </ul>
        </div>
    </div>
</nav>