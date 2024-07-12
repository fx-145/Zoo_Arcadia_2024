<?php
//Générer le token CSRF qui sera vérifié dans le fichier récepteur "security_receiver"
if (session_status() == PHP_SESSION_NONE) {
    // Si aucune session n'est démarrée, démarrer une nouvelle session

    session_start();
}
$_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>
<!-- token CSRF -->
<div class="form-group">
    <input type="hidden" name="csrf_token"
        value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
</div>