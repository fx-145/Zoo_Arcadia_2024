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
            '/'  => 'index.php',
            '/services' => 'services.php',
            '/homes' => 'homes.php',
            '/connection' => 'connection.php',
            '/contact' => 'contact.php',
            '/admin' => 'admin_area.php',
            '/vet' => 'vet_area.php',
            '/employee' => 'employee_area.php',
            '/information'=> 'information.php'
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