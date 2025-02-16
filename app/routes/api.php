<?php
require_once "../app/controllers/TaskController.php";

$url = $_GET['url'] ?? "";
$url = strtolower(trim($url, "/"));

$taskController = new TaskController();

switch (true) {
    case $url === "tasks":
        $taskController->index();
        break;

    case preg_match("/^tasks\/(\d+)$/", $url, $matches):
        $taskController->getTaskById($matches[1]);
        break;

    case preg_match("/^tasks\/user\/(\d+)$/", $url, $matches):
        $taskController->getTasksByUserId($matches[1]);
        break;

    case $url === "tasks/create" && $_SERVER['REQUEST_METHOD'] === 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $taskController->createTask($data);
        break;

    case preg_match("/^tasks\/update\/(\d+)$/", $url, $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $taskController->updateTask($matches[1], $data);
        break;

    case preg_match("/^tasks\/delete\/(\d+)$/", $url, $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE':
        $taskController->deleteTask($matches[1]);
        break;

    case (preg_match("/tasks\/sort\/(\w+)(?:\/(ASC|DESC))?/", $url, $matches) ? true : false):
        $order = isset($matches[2]) ? $matches[2] : "ASC"; 
        (new TaskController())->sortTasks($matches[1], $order);
        break;


    default:
        echo json_encode(["error" => "Invalid API endpoint"]);
        break;
}
