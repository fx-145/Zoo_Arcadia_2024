<?php

class Navbar
{
    // Retourne l'URl actuelle
    public function getCurrentUri()
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    // Vérifie si l'URl actuelle correspond à la valeur donnée
    //public function urlValue($value)
    //{
       // return $this->getCurrentUri() === $value;
    //}

    public function urlValue($value, $params = []) {
        // Générer l'URL avec les paramètres fournis
        // $params est facultatif, si un message est présent dans l'Url on va l'utiliser
        $url = $value;
        if (!empty($params)) {
            $queryString = http_build_query($params);
            $url .= '?' . $queryString;
        }
        return $url;
    }

    public function router($uri)
    {
        $uri = str_replace('/app', '', $uri);
        $routes = [
            '/'  => 'app/views/index.view.php',
            '/services' => 'app/views/services.view.php',
            '/homes' => 'app/views/homes.view.php',
            '/connection' => 'app/views/connection.view.php',
            '/contact' => 'app/views/contact.view.php',
            '/admin' => 'app/views/admin_area.view.php',
            '/vet' => 'app/views/vet_area.view.php',
            '/employee' => 'app/views/employee_area.view.php',
            '/information'=> 'app/views/information.php',
            '/opinionStatusUpdate' => 'app/controllers/handler/opinionStatusUpdate.php',
            '/employee_validation_opinion' => 'app/views/elements/employee_validation_opinions.php',
            '/opinionSend' => 'app/controllers/handler/opinionSend.php',
            '/admin_area'=> 'app/views/admin_area.view.php',
            '/employee_area'=> 'app/views/employee_area.view.php',
            '/vet_area'=> 'app/views/vet_area.view.php',
            '/homeDetails'=> 'app/views/homeDetails.php',
            '/employee_food_form' => 'app/views/employee_food_form.php',
            '/employee_report_handler' => 'app/controllers/handler/employee_report_handler.php',
            '/vet_visit_form' => 'app/views/vet_visit_form.php',
            '/vet_reports_for_admin' => 'app/views/vet_reports_for_admin.php',
            '/end_session' =>'app/controllers/handler/endSession.php',
            '/crud_homes' =>'app/views/crud/crud_homes.php',
            '/crud_homes_update' =>'app/views/crud/crud_homes_update.php',
            '/crudHomeHandler'=> 'app/controllers/handler/editHandler/crudHomeHandler.php',
            '/crudHomePictureHandler'=> 'app/controllers/handler/editHandler/crudHomePictureHandler.php',
            '/crud_homes_add'=> 'app/views/crud/crud_homes_add.php',
            '/crud_home_picture_add'=> 'app/views/crud/crud_home_picture_add.php'
        ];
        
        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
            return true;
        } else {
            http_response_code(404);
            require 'app/views/404.php';
            echo "La page demandée n'existe pas.";
            die();
        }

    }

}
