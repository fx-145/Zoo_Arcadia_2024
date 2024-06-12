<?php
require_once 'app/controllers/router/Router.controller.php';

$controller = new Navbar();
$uri = $controller->getCurrentUri();
$result = $controller->router($uri);
