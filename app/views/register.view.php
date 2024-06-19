<div class="container mt-4">
  <!-- formulaire d'inscription utilisateur  -->
  <h1> FORMULAIRE D'INSCRIPTION UTILISATEUR </h1>
  <form action="../controllers/handler/Registerhandler.php" method="POST">
    <!-- EMAIL -->
    <div class="form-group">
    <label for="userName">Renseigner l'adresse email:</label>
    <input type="userName" name="userName" required /> <br><br>
    </div>
    <!-- PASSWORD -->
    <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required /> <br><br>
    </div>
    <!-- CONFIRMATION PASSWORD -->
    <div class="form-group">
    <label for="confirmPassword">Confirmation du mot de passe :</label>
    <input type="password" name="confirmPassword" required /> <br><br>
    </div>
    <!-- Compte: choix entre employé et vétérinaire -->
    <div class="form-group">
      <label>Compte <br>
        <input type="radio" name="compte" value="employe" required> Employé
      </label>
      <br>
      <label>
        <input type="radio" name="compte" value="veterinaire" required> Veterinaire
      </label>
      </div>
      <br>
      <br>
      <!-- Ajoutez autant d'options que nécessaire -->


      <!-- BUTTON -->
      <input type="submit"class="btn btn-primary" name="submitForm" value="s'inscrire" />
  </form>

  </div>
