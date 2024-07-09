<?php
//require_once '../../../../config.php';
//require_once APP_MODEL_PATH. '/HomeModel.php';

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
    public function getHomeWithId($home_id)
    {
        return $this->model->getHomeWithId($home_id);

    }

    public function updateHome($home_id, $newHomeName, $newHomeDescription)
    {
        return $this->model->updateHome($home_id, $newHomeName, $newHomeDescription);

    }
    public function addHome($home_name, $home_description)
    {
        return $this->model->addHome($home_name, $home_description);

    }
    public function deleteHome($home_id) {
        return $this->model->deleteHome($home_id);
        
    } 
    
}