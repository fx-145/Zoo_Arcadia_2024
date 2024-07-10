
<?php
require_once 'app/controllers/OpeningTimeController.php';

class OpeningHoursHandler
{

    private $controller;
    public function __construct()
    {
        $this->controller = new OpeningTimeController();
    }
    
    public function handleUpdateHours()
    {
        
        $op_hours_id = $_POST['opening_time_id'];
        $new_opening_time = $_POST['new_opening_time'];
        $new_closing_time = $_POST['new_closing_time'];
        $this->controller->updateOpeningHours($op_hours_id, $new_opening_time, $new_closing_time);
        header("Location:crud_opening_hours");
        exit(); // fin du script
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formHandler = new OpeningHoursHandler();

    if (isset($_POST['submit_update_hours'])) {
        $formHandler->handleUpdateHours();
      
    } 
}