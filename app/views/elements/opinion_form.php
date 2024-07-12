<div class="container mt-4">
    <form action="opinionSend" id="visitorForm" method="post">
        <!-- Génération du token CSRF -->
        <?php include "app/controllers/handler/security_issuer.php"; ?>

        <div class="form-group">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="avis">Avis :</label>
            <textarea id="avis" name="avis" class="form-control" rows="4" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>