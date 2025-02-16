<?php

class TaskApp
{

    //Default controller and method ie UserController/index()
    private  $controller = 'UserController';
    private $method = 'index';


    private function splitUrl()
    {
        $URL = $_GET['url'] ?? 'UserController';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitUrl();

        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename; //load the controller
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            echo "file path: '{$filename}' does not exist <br>";
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";

        }


        $currentController = new $this->controller;

        if(!empty($URL[1]))
        {
            if(method_exists($currentController, $URL[1]))
            {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        show($URL);

        call_user_func_array([$currentController, $this->method],$URL);

    }
}
