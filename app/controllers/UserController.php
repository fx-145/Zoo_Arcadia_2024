<?php

require_once '../../models/UserModel.php';

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
}