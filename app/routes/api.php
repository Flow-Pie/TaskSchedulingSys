<?php
require_once "../app/controllers/TaskController.php";

// Sanitize and validate the URL
$url = $_GET['url'] ?? "";
$url = strtolower(trim($url, "/"));
$url = filter_var($url, FILTER_SANITIZE_URL);

$taskController = new TaskController();

function getJsonInput()
{
    return json_decode(file_get_contents("php://input"), true);
}

// Route handling
switch (true) {
    case $url === "taskpage":
        $taskController->index();
        break;

    case $url === "test":
        require_once __DIR__ . "/../../public/testings.php";
        break;

    case $url === "tasks":
        $taskController->getAll();
        break;

    case preg_match("/^tasks\/(\d+)$/", $url, $matches):
        $taskController->getTaskById($matches[1]);
        break;

    case preg_match("/^tasks\/user\/(\d+)$/", $url, $matches):
        $taskController->getTasksByUserId($matches[1]);
        break;

    case $url === "tasks/add" && $_SERVER['REQUEST_METHOD'] === 'POST':
        $data = getJsonInput();
        $taskController->addNewTask($data);
        break;

    case preg_match("/^tasks\/update\/(\d+)$/", $url, $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT':
        $data = getJsonInput();
        $taskController->updateTask($matches[1], $data);
        break;

    case preg_match("/^tasks\/delete\/(\d+)$/", $url, $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE':
        $taskController->deleteTask($matches[1]);
        break;

    case preg_match("/^tasks\/sort\/(\w+)(?:\/(ASC|DESC))?$/", $url, $matches):
        $order = $matches[2] ?? "DESC";
        $taskController->sortTasks($matches[1], $order);
        break;

    default:
        http_response_code(404); // Not Found
        echo json_encode(["error" => "Invalid API endpoint"]);
        break;
}
