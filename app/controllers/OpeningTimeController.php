<?php
require_once __DIR__ . '/../models/OpeningTimeModel.php';
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

    public function getOpeningHoursWithId($op_hours_id)
    {
        return $this->model->getOpeningHoursWithId($op_hours_id);

    }

    public function updateOpeningHours($op_hours_id, $new_opening_time, $new_closing_time)
    {
        return $this->model->updateOpeningHours($op_hours_id, $new_opening_time, $new_closing_time);

    }
}