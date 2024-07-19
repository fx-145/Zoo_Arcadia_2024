
<?php
echo "test";
var_dump(getenv('DB_HOST'));


try {
    require_once __DIR__ . '/app/controllers/router/Router.controller.php';
    if($_SERVER['REQUEST_URI'] == '/index.php') {
        $_SERVER['REQUEST_URI'] = '/';
        $controller = new Navbar();
        $uri = $controller->getCurrentUri();
        $result = $controller->router($uri);
        var_dump($result);
    }
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    //return null;
}