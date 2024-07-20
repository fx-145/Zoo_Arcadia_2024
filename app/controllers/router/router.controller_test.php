<?php

class Navbar
{
    // Retourne l'URL actuelle
    public function getCurrentUri()
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    public function urlValue($value, $params = []) {
        // Générer l'URL avec les paramètres fournis
        $url = $value;
        if (!empty($params)) {
            $queryString = http_build_query($params);
            $url .= '?' . $queryString;
        }
        return $url;
    }

    public function router()
    {
        $uri = $this->getCurrentUri();
        $uri = str_replace('/app', '', $uri);
        $routes = [
            '/'  => __DIR__ . '/../../views/index.view.php',
            '/services' => __DIR__ . '/../../views/services.view.php',
            '/homes' => __DIR__ . '/../../views/homes.view.php',
            '/connection' => __DIR__ . '/../../views/connection.view.php',
            '/contact' => __DIR__ . '/../../views/contact.view.php',
            '/admin' => __DIR__ . '/../../views/admin_area.view.php',
            '/vet' => __DIR__ . '/../../views/vet_area.view.php',
            '/employee' => __DIR__ . '/../../views/employee_area.view.php',
            '/information'=> __DIR__ . '/../../views/information.php',
            '/opinionStatusUpdate' => __DIR__ . '/../../controllers/handler/opinionStatusUpdate.php',
            '/employee_validation_opinion' => __DIR__ . '/../../views/employee_validation_opinions.php',
            '/opinionSend' => __DIR__ . '/../../controllers/handler/opinionSend.php',
            '/admin_area'=> __DIR__ . '/../../views/admin_area.view.php',
            '/employee_area'=> __DIR__ . '/../../views/employee_area.view.php',
            '/vet_area'=> __DIR__ . '/../../views/vet_area.view.php',
            '/homeDetails'=> __DIR__ . '/../../views/homeDetails.php',
            '/homeDetailsHandler'=> __DIR__ . '/../../controllers/handler/homeDetailsHandler.php',
            '/employee_food_form' => __DIR__ . '/../../views/employee_food_form.php',
            '/employee_report_handler' => __DIR__ . '/../../controllers/handler/employee_report_handler.php',
            '/vet_visit_form' => __DIR__ . '/../../views/vet_visit_form.php',
            '/vet_reports_for_admin' => __DIR__ . '/../../views/vet_reports_for_admin.php',
            '/end_session' =>__DIR__ . '/../../controllers/handler/endSession.php',
            '/crud_homes' =>__DIR__ . '/../../views/crud/crud_homes.php',
            '/crud_homes_update' =>__DIR__ . '/../../views/crud/crud_homes_update.php',
            '/crudHomeHandler'=> __DIR__ . '/../../controllers/handler/editHandler/crudHomeHandler.php',
            '/crudHomePictureHandler'=> __DIR__ . '/../../controllers/handler/editHandler/crudHomePictureHandler.php',
            '/crud_homes_add'=> __DIR__ . '/../../views/crud/crud_homes_add.php',
            '/crud_home_picture_add'=> __DIR__ . '/../../views/crud/crud_home_picture_add.php',
            '/crud_animals' =>__DIR__ . '/../../views/crud/crud_animals.php',
            '/crud_animals_update' =>__DIR__ . '/../../views/crud/crud_animals_update.php',
            '/crudAnimalHandler'=> __DIR__ . '/../../controllers/handler/editHandler/crudAnimalHandler.php',
            '/crud_animals_add'=> __DIR__ . '/../../views/crud/crud_animals_add.php',
            '/crud_animal_picture_add'=> __DIR__ . '/../../views/crud/crud_animal_picture_add.php',
            '/crudAnimalPictureHandler'=> __DIR__ . '/..controllers/handler/editHandler/crudAnimalPictureHandler.php',
            '/crud_services' =>__DIR__ . '/../../views/crud/crud_services.php',
            '/crud_services_update' =>__DIR__ . '/../../views/crud/crud_services_update.php',
            '/crudServiceHandler'=> __DIR__ . '/../../controllers/handler/editHandler/crudServiceHandler.php',
            '/crud_services_add'=> __DIR__ . '/../../views/crud/crud_services_add.php',
            '/crud_opening_hours'=> __DIR__ . '/../../views/crud/crud_opening_hours.php',
            '/crud_opening_hours_update'=> __DIR__ . '/../../views/crud/crud_opening_hours_update.php',
            '/crudOpeningHoursHandler'=> __DIR__ . '/../../controllers/handler/editHandler/crudOpeningHoursHandler.php',
            '/register' =>__DIR__ . '/../../views/register.view.php',
            '/registerHandler'=> __DIR__ . '/../../controllers/handler/RegisterHandler.php',
            '/animal_details' => __DIR__ . '/../../views/animal_details.php',
            '/viewsHandler' => __DIR__ . '/../../controllers/handler/viewsHandler.php',
            '/animal_views' => __DIR__ . '/../../views/animal_views.php',
            '/resetViewsHandler' => __DIR__ . '/../../controllers/handler/resetViewsHandler.php',
            '/security_issuer' => __DIR__ . '/../../controllers/handler/security_issuer.php',
        ];

        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
            return true;
        } else {
            http_response_code(404);
            require __DIR__ . '/../views/404.php';
            echo "La page demandée n'existe pas.";
            die();
        }
    }
}

// utilisation du routeur
$navbar = new Navbar();
$navbar->router($navbar->getCurrentUri());
