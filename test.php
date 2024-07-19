
<?php
echo "test";


require_once __DIR__ . '/app/controllers/router/Router.controller.php';
$controller = new Navbar();
var_dump($controller);
$uri = $controller->getCurrentUri();
var_dump($uri);
$result = $controller->router($uri);
var_dump($result);





try {
    require_once __DIR__ . '/app/controllers/router/Router.controller.php';
    if($_SERVER['REQUEST_URI'] == '/test.php') {
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