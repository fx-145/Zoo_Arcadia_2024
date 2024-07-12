<?php
require_once __DIR__ . '/../../config.php';
require_once APP_MODEL_PATH . '/ViewModel.php';

class ViewController
{
    private $model;

    public function __construct()
    {
        $this->model = new ViewModel();
    }
    public function getAnimalMdb($animal_id)
    {
        return $this->model->getAnimalMdb($animal_id);
    }
    public function addNewAnimalAndView($animal_id, $animal_name, $race)
    {
        return $this->model->addNewAnimalAndView($animal_id, $animal_name, $race);
    }
    public function incrementView($animal_id)
    {
        return $this->model->incrementView($animal_id);
    }
    public function getAnimalViews()
    {
        return $this->model->getAnimalViews();
    }
    public function resetAnimalViews()
    {
        return $this->model->resetAnimalViews();
    }
}