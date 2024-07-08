<?php

//require_once '../../models/EmployeeModel.php';
// -- require_once 'app/models/EmployeeModel.php';
//require_once '../../../config.php';
require_once __DIR__.'../../../config.php';
require_once APP_MODEL_PATH . '/EmployeeModel.php';
class EmployeeController {
    private $model;

    public function __construct() {
        $this->model = new EmployeeModel();
    }


    public function EmployeePassageReport($animal_id, $user_id,$type_of_food_given, $qty_of_food_given, $date_time) {
        return $this->model->EmployeePassageReport($animal_id, $user_id,$type_of_food_given, $qty_of_food_given, $date_time);
        
    }

    public function getEmployeeReports() {
        return $this->model->getEmployeeReports();
        
    }
  

}