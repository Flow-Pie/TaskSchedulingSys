<?php


class TaskApp
{
    private $controller = 'UserController';
    private $method = 'index';

    private function splitUrl()
    {
        $URL = $_GET['url'] ?? '';
        return explode("/", trim($URL, "/"));
    }

    public function loadController()
    {
        $URL = $this->splitUrl();
        $controllerFile = "../app/controllers/" . $URL[0]. ".php";

        // If the first segment is a valid controller, load it
        if (file_exists($controllerFile)) {
            require $controllerFile;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            // If not a controller, assume it's an API route
            require "../app/routes/api.php";
            exit;
        }

        $currentController = new $this->controller;

        if (!empty($URL[1]) && method_exists($currentController, $URL[1])) {
            $this->method = $URL[1];
            unset($URL[1]);
        }

        $params = array_values($URL);
        call_user_func_array([$currentController, $this->method], $params);
    }
}
