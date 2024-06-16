<?php
require_once 'app/controllers/router/Router.controller.php';

$controller = new Navbar();
$uri = $controller->getCurrentUri();
//$uri = str_replace('/index.php', '/', $uri);
//var_dump($uri);
$result = $controller->router($uri);


