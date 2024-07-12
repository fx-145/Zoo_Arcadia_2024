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
    public function getServiceWithId($service_id)
    {
        return $this->model->getServiceWithId($service_id);
    }
    public function addService($service_name, $service_description)
    {
        return $this->model->addService($service_name, $service_description);
    }

    public function updateService($service_id, $new_service_name, $new_service_description)
    {
        return $this->model->updateService($service_id, $new_service_name, $new_service_description);
    }
    public function deleteService($service_id)
    {
        return $this->model->deleteService($service_id);
    }
}