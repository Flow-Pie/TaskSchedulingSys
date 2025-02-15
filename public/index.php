<?php

session_start();
require "../app/core/init.php";

$app = new TaskApp();

$app->loadController();//load the controller from the core folder TaskApp class




