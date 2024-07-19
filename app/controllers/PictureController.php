<?php
require_once __DIR__ . '/../models/PictureModel.php';

class PictureController
{
    private $model;

    public function __construct()
    {
        $this->model = new PictureModel();
    }
    public function getHomePictures($home_id)
    {
        return $this->model->getHomePictures($home_id);
    }
    public function addHomePictures($home_id, $home_picture_path)
    {
        return $this->model->addHomePictures($home_id, $home_picture_path);
    }
    public function deleteHomePicture($home_picture_id)
    {
        return $this->model->deleteHomePicture($home_picture_id);
    }
    public function getAnimalPictures($animal_id)
    {
        return $this->model->getAnimalPictures($animal_id);
    }
    public function addAnimalPictures($animal_id, $animal_picture_path)
    {
        return $this->model->addAnimalPictures($animal_id, $animal_picture_path);
    }

    public function deleteAnimalPicture($animal_picture_id)
    {
        return $this->model->deleteAnimalPicture($animal_picture_id);
    }
}