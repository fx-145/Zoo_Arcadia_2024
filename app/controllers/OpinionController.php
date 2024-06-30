<?php

require_once 'app/models/OpinionModel.php';

class OpinionController
{
    private $model;

    public function __construct()
    {
        $this->model = new OpinionModel();
    }

    public function sendVisitorOpinion($pseudo, $opinion)
    {
        return $this->model->sendVisitorOpinion($pseudo, $opinion);

    }

    public function showPendingvisitorOpinions (){
        return $this->model->showPendingvisitorOpinions ();
    }

    public function updateOpinionStatus($opinion_id, $newOpinionStatus){
        return $this->model->updateOpinionStatus ($opinion_id, $newOpinionStatus);
    }

    public function getValidatedOpinions(){
        return $this->model->getValidatedOpinions();
    }




}








