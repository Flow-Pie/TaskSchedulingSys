<?php

class TaskController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new TaskModel();
    }

    public function index()
    {
        return $this->view('task');
    }

    public function getTaskById($id)
    {
        $task = $this->model->where(['task_id' => $id]);
        echo json_encode($task);
    }

    public function getTasksByUserId($userId)
    {
        $tasks = $this->model->where(['user_id' => $userId]);
        echo json_encode($tasks);
    }

    public function addNewTask($data)
    {
        $taskId = $this->model->insert($data);
        echo json_encode(["success" => true, "task_id" => $taskId]);
    }

    public function updateTask($id, $data)
    {
        if (is_array($id)) {
            die("Error: task_id should not be an array!");
        }

        $updated = $this->model->update($id, $data);
        echo json_encode(["success" => $updated]);
    }


    public function deleteTask($id)
    {
        $deleted = $this->model->delete($id);
        echo json_encode(["success" => $deleted]);
    }


    public function sortTasks($column, $order = "ASC")
    {
        $order = strtoupper($order);
        if (!in_array($order, ["ASC", "DESC"])) {
            $order = "ASC";
        }

        $res = $this->model->orderBy($column, $order)->getAll();

        error_log("Sorting by: " . $column . " " . $order);

        echo json_encode($res);
    }

    public function getAll()
    {
        $tasks = $this->model->getAll();
        echo json_encode($tasks);

    }


}
