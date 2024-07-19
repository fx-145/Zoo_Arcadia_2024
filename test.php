
<?php
echo "test";
var_dump(getenv('DB_HOST'));


try {
    require_once __DIR__ . '/app/controllers/router/Router.controller.php';

    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    return null;
}