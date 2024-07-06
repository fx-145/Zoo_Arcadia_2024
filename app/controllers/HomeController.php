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
    public function getHomesAndOnePicture()
    {
        return $this->model->getHomesAndOnePicture();

    }
    public function getHomeAndAnimalsDetails($home_id)
    {
        return $this->model->getHomeAndAnimalsDetails($home_id);

    }
    
}