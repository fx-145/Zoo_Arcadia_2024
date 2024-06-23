<?php
require_once '../../../config/Database.php';
require '../../../vendor/autoload.php'; //charger les dépendances de composer
use Ramsey\Uuid\Uuid;//utilisation de l'UUID pour générer des id_users sécurisés.

class UserModel
{   // initialisation de la bdd
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->db;

    }

    public function checkUser($userName)
    {// Vérifier si l'adresse email ou  user_name est déjà dans la bdd
        {


            try {
                $query = "SELECT user_id FROM users WHERE user_name = :user_name";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':user_name', $userName, PDO::PARAM_STR);
                $statement->execute();

                if ($statement->rowCount() > 0) {

                    //var_dump($userName);
                    echo "cet identifiant est déjà utilisé";
                    return false;
                } else {

                    return true;
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return null;


            }

        }
    }

    //  Créer un user_id sécurisé: Generer une version 4 (random) UUID: en 128 bits conforme à la spécification uuid
    public function CreateSecuredId()
    {
        $uuid = Uuid::uuid4()->toString();
        return $uuid;
    }

    // Vérification du niveau de sécurité du mot de passe et sa confirmation à l'identique
    function validatePassword($password, $confirmPassword)
{   //les erreurs seront affichées dans le tableau $errors
    $errors = [];

    if (strlen($password) < 8) {
        $errors[] = 'Le mot de passe doit contenir au moins 8 caractères.';
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins une lettre majuscule.';
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins une lettre minuscule.';
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins un chiffre.';
    }
    if (!preg_match('/[\W]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins un caractère spécial.';
    }
    if ($password !== $confirmPassword) {
        $errors[] = 'Les mots de passe ne correspondent pas.';
    }

    if (!empty($errors)) {
        // Si des erreurs sont présentes, on les affiche (ou les traite)
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        return false;
    }

    return true;
}

    // Créer le mot de passe hashé
    public function CreateSecuredPassword($password)
    {
        try {
            // Hashage du password(encryptage)
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            return $hashedPassword;
        } catch (PDOException $e) {
            echo "Erreur lors du hashage du mot de passe : " . $e->getMessage();
        }
    }



    public function RegisterUser($uuid, $userName, $hashedPassword)
    {
        // Insérer les données dans la base : dans la table users
        try {
            $insertQuery = "INSERT INTO users (user_id, user_name, password) VALUES (:user_id, :user_name, :password)";

            $stmt = $this->db->prepare($insertQuery);
            $stmt->bindValue(':user_id', $uuid);
            $stmt->bindValue(':user_name', $userName);
            $stmt->bindValue(':password', $hashedPassword);
            $stmt->execute();
            return $stmt;

            //echo "Données de register user $userName enregistrées";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
    public function getRoleId($optionRole)
    {
        // Récupérer le role_id en fonction du role_name
        try {
            $query = "SELECT role_id FROM roles WHERE role_name = :role_name";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':role_name', $optionRole, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['role_id'];

            } else {
                echo "Impossible de récupérer le role_id";
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    public function RegisterRole($uuid, $roleId)
    {
        // Insérer les données du nouvel user avec son rôle dans la base : dans la table user_roles
        try {
            $insertQuery = "INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id)";

            $stmt = $this->db->prepare($insertQuery);
            $stmt->bindValue(':user_id', $uuid);
            $stmt->bindValue(':role_id', $roleId);
            $stmt->execute();
            return $stmt;

            //echo "Données de role user enregistrées, inscription réussie";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
}

