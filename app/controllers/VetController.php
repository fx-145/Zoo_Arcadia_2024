<?php

//require_once '../../models/VetModel.php';
require_once __DIR__. '/../../config.php';
require_once APP_MODEL_PATH . '/VetModel.php';
class VetController {
    private $model;

    public function __construct() {
        $this->model = new VetModel();
    }


    public function addVetPassageReport($animal_id, $user_id,$type_of_food_proposed, $qty_of_food_proposed, $date, $animal_condition, $animal_condition_detail,$home_condition,$home_id) {
        return $this->model->addVetPassageReport($animal_id, $user_id,$type_of_food_proposed, $qty_of_food_proposed, $date, $animal_condition, $animal_condition_detail,$home_condition,$home_id);
        
    }

    public function getVetReports() {
        return $this->model->getVetReports();
        
    }
    
}