<?php //every file inside core folder should be loaded here
require "config.php";
require "functions.php";
require "Database.php";
require "Model.php";
require "Controller.php";
//any other file created inside core  should be loaded here --



require "TaskApp.php";//this file should be loaded  last because it is the main file
