<?php

require_once __DIR__ . '../../../config.php';
require_once APP_MODEL_PATH . '/AnimalModel.php';



//--require_once 'app/models/AnimalModel.php';

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
    public function scrollBarAnimalName()
    {
        return $this->model->scrollBarAnimalName();

    }
    public function getAnimalId($animal_name)
    {
        return $this->model->getAnimalId($animal_name);

    }
    
    
}    