<?php

class TaskApp
{

    private $controller = 'Dashboard';
    private $method = 'index';


    private function splitUrl()
    {
        $URL = $_GET['url'] ?? 'dashboard';
        $URL = explode("/", $URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitUrl();

        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename; //load the controller
            $this->controller = ucfirst($URL[0]);
        } else {
            echo "file path: '{$filename}' does not exist <br>";
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";

        }

        $dashboard = new $this->controller;
        call_user_func_array([$dashboard, $this->method],[]);

    }
}
