
<?php
// 1. Etape 1: renseigner l'email de notre futur compte admin de José qui sera le login
$adminEmail = 'admin@mail.fr';
// 2. Etape 2: Définir un mot de passe
$adminpassword = "jose0!";
// 3. Etape 3: Crypter le mot de passe par hashage BCRYPT, la même méthode qui est utilisée lors de l'enregistrement des utilisateurs
$hashedAdminPassword = password_hash($adminpassword, PASSWORD_BCRYPT);
echo ($hashedAdminPassword);
// 4. Récupérer le mot de passe qui s'affiche à l'écran: le copier.