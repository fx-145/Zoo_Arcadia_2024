<?php

class Navbar
{
    // Retourne l'URI actuelle
    public function getCurrentUri()
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    // Vérifie si l'URI actuelle correspond à la valeur donnée
    public function urlValue($value)
    {
        return $this->getCurrentUri() === $value;
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
            '/admin' => 'admin_area.php'
        ];
        //var_dump($uri);
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
