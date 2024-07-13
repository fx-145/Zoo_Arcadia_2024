<div class="container-fluid py-5 main-content">
    <form action="opinionSend" id="visitorForm" method="post">
        <!-- Génération du token CSRF -->
        <?php include "app/controllers/handler/security_issuer.php"; ?>

        <div class="form-group col-md-2">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="avis">Avis :</label>
            <textarea id="avis" name="avis" class="form-control" rows="4" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>