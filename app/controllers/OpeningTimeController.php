<?php
require_once 'app/models/OpeningTimeModel.php';

class OpeningTimeController
{
    private $model;

    public function __construct()
    {
        $this->model = new OpeningTimeModel();
    }


    public function getOpeningHours()
    {
        return $this->model->getOpeningHours();

    }

}