<!-- Appel de l'area admin-->
<?php include_once "app/views/elements/admin_area.php"; ?>
<!-- Affichage de la sidebar -->
<?php include_once "app/views/layouts/sidebar_admin.php"; ?>
<!-- Affichage de la navbar -->
<div id="content">
  <?php include_once "app/views/layouts/navbar.php"; ?>
  

  <body>

    <div class="container-fluid py-5 main-content">
    <button class="btn btn-primary" id="menu-toggle">
    <>
  </button>
      <!-- formulaire d'inscription utilisateur  -->
      <h1 class="mb-4">Formulaire d'inscription utilisateur</h1>
      <h5> <em>Un email sera envoyé automatiquement au nouvel utilisateur, contenant son identifiant de connexion</em>
      </h5>
      <form action="registerHandler" method="POST">
        <!-- Génération du token CSRF -->
        <?php include "app/controllers/handler/security_issuer.php"; ?>
        <!-- EMAIL -->
        <div class="form-group col-md-2">
          <label for="userName">Renseigner l'adresse email:</label>
          <input type="email" class="form-control" id="userName" name="userName" required>
        </div>
        <br>
        <!-- PASSWORD -->
        <div class="form-group col-md-2">
          <label for="password">Mot de passe :</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <br>
        <!-- CONFIRMATION PASSWORD -->
        <div class="form-group col-md-2 col-md-2">
          <label for="confirmPassword">Confirmation du mot de passe :</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <br>
        <!-- Compte: choix entre employé et vétérinaire -->
        <div class="form-group col-md-2 col-md-2">
          <label>Compte</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="employe" name="compte" value="employe" required>
            <label class="form-check-label" for="employe">Employé</label>
          </div>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="veterinaire" name="compte" value="veterinaire" required>
            <label class="form-check-label" for="veterinaire">Vétérinaire</label>
          </div>
        </div>
        <br>
        <!-- BUTTON -->
        <button type="submit" class="btn btn-primary" name="submitForm">Enregistrer</button>
      </form>
      <br>
    </div>
    <!-- Appel du footer -->
    <?php include "app/views/layouts/footer.php"; ?>
    <!-- Appel des scripts -->
    <?php include "app/views/layouts/scripts.php"; ?>
    <!-- Appel du script de la sidebar -->
    <script src="public/js/sidebar_script.js"></script>
  </body>

  </html>