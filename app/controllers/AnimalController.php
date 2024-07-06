<?php

require_once 'app/models/AnimalModel.php';

class AnimalController {
    private $model;

    public function __construct() {
        $this->model = new AnimalModel();
    }
    public function getAnimals() {
        return $this->model->getAnimals();     
    }
    public function getAnimalsAndOnePicture($home_id)
    {
        return $this->model->getAnimalsAndOnePicture($home_id);

    }
}    