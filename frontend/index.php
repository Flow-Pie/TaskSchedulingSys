<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

$allowedPages = ['dashboard', 'tasks', 'login', 'register', 'new_task'];

if (!in_array($page, $allowedPages)) {
    $page = 'dashboard';
}

// Include the selected page
require "views/$page.php";
