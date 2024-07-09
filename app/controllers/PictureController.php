<?php
require_once 'app/models/PictureModel.php';

class PictureController {
    private $model;

    public function __construct() {
        $this->model = new PictureModel();
    }


    public function getHomePictures($home_id) {
        return $this->model->getHomePictures($home_id);
        
    }

    public function addHomePictures($home_id, $home_picture_path) {
        return $this->model->addHomePictures($home_id, $home_picture_path);
        
    }
    
    public function deleteHomePicture($home_picture_id) {
        return $this->model->deleteHomePicture($home_picture_id);
        
    } 
    public function getAnimalPictures($animal_id) {
        return $this->model->getAnimalPictures($animal_id);
        
    } 
    
}