<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ROOT', 'http://localhost/Task/public/');


    define('DBNAME', 'TaskSchedulingSys');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
}

define('DEBUG', true);
define('APPNAME', 'Task Scheduling System');
define('APPVERSION', '1.0.0');
