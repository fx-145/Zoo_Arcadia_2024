<?php
require_once 'app/models/ServiceModel.php';
class ServiceController
{
    private $model;

    public function __construct()
    {
        $this->model = new ServiceModel();
    }


    public function getServices()
    {
        return $this->model->getServices();

    }
}