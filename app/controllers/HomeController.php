<?php
require_once 'app/models/HomeModel.php';

class HomeController
{
    private $model;

    public function __construct()
    {
        $this->model = new HomeModel();
    }


    public function getHomes()
    {
        return $this->model->getHomes();

    }
}