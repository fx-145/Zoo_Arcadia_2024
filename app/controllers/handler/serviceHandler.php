<?php 
require_once 'app/controllers/ServiceController.php';
$controller = new ServiceController();
$result = $controller->getServices();
