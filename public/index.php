<?php

session_start();
require "../app/core/init.php";

if(DEBUG) {
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}


$app = new TaskApp();

try{
    $app->loadController();//load the controller from the core folder TaskApp class

}catch(Exception $e){
    echo $e->getMessage();
}



