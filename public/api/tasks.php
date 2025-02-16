<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "../../app/core/Database.php";

$db = new Database();
$conn = $db->connect();

// Fetch tasks from the database
$query = "SELECT id, title, status FROM tasks";
$result = $conn->query($query);

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);
