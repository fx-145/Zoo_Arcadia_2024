<?php
//namespace UserController;
//require_once 'app/models/UserModel.php';
require_once '../../../config.php';
require_once APP_MODEL_PATH . '/UserModel.php';


//require_once '../../models/UserModel.php';

//require_once __DIR__ .'/models/UserModel.php';
//use UserModel\UserModel;
class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function checkUser($userName){
        return $this->model->checkUser($userName);
    }

    public function CreateSecuredId(){
        return $this->model->CreateSecuredId();
    }

    public function CreateSecuredPassword($passwordForm){
        return $this->model->CreateSecuredPassword($passwordForm);
    }

    public function validatePassword($password, $confirmPassword){
        return $this->model->validatePassword($password, $confirmPassword);
    }

    public function getRoleId($roleName){
        return $this->model->getRoleId($roleName);
    }

    public function RegisterUser($uuid, $userName, $hashedPassword){
        return $this->model->RegisterUser($uuid, $userName, $hashedPassword);
    }

    public function RegisterRole($uuid, $role_id){
        return $this->model->RegisterRole($uuid, $role_id);
    }

    public function checkUserLogin($userName){
        return $this->model->checkUserLogin($userName);
    }
    public function getPassword($userName){
        return $this->model->getPassword($userName);
    }

    public function checkPassword($passwordForm, $password){
        return $this->model->checkPassword($passwordForm, $password);
    }

    public function checkRole($userName){
        return $this->model->checkRole($userName);
    }

    public function roleRouter($userName, $role){
        return $this->model->roleRouter($userName, $role);
    }

    public function getUserId($userName){
        return $this->model->getUserId($userName);
    }

    
}