<?php
require_once 'app/models/PictureModel.php';
//require_once '../handler/EditHandler.php';

class PictureController {
    private $model;

    public function __construct() {
        $this->model = new PictureModel();
    }


    public function getHomePictures($home_id) {
        return $this->model->getHomePictures($home_id);
        
    }
}