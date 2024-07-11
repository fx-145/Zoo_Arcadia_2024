<?php
require_once 'app/controllers/ViewController.php';
$controller = new ViewController();
$controller->resetAnimalViews();
header("Location: animal_views");
