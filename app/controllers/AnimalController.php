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
    public function getAnimalHomeId($animal_name)
    {
        return $this->model->getAnimalHomeId($animal_name);

    }
    public function getAllAnimalWithHomes()
    {
        return $this->model->getAllAnimalWithHomes();

    }
    public function getAnimalsWithId($animal_id)
    {
        return $this->model->getAnimalsWithId($animal_id);

    }

    public function updateAnimal($animal_id,$new_animal_name, $new_animal_race,$new_home_id)
    {
        return $this->model->updateAnimal($animal_id,$new_animal_name, $new_animal_race,$new_home_id);

    }
    public function addAnimal($animal_name, $animal_race,$home_id)
    {
        return $this->model->addAnimal($animal_name, $animal_race,$home_id);

    }
    public function deleteAnimal($animal_id)
    {
        return $this->model->deleteAnimal($animal_id);

    }

    public function getOneAnimalAndAllPictures($animal_id)
    {
        return $this->model->getOneAnimalAndAllPictures($animal_id);

    }
    public function getAnimalCondition($animal_id)
    {
        return $this->model->getAnimalCondition($animal_id);

    }
    
}    