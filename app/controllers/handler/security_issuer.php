<?php
// Générer le token CSRF
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
//$csrf_token = $_SESSION['csrf_token']; ?>
<div class="form-group">
    <input type="hidden" name="csrf_token"
    value="<?php echo $_SESSION['csrf_token']; ?>">
</div>
