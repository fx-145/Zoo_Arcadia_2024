<?php
require_once 'app/controllers/router/Router.controller.php';

//var_dump($_SERVER['REQUEST_URI']);

if($_SERVER['REQUEST_URI'] == '/index.php') {
    $_SERVER['REQUEST_URI'] = '/';
}
$controller = new Navbar();
$uri = $controller->getCurrentUri();
$result = $controller->router($uri);



