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

        //eg how to view task by id
        $res = $this->model->where(['user_id' => 1]);
        show($res);
        
        echo " This is the Task Controller <br>";
        $this->view("task");
    }

    public function edit()
    {
        echo " This is the Task Controller from view function <br>";
        $this->view("task");
    }

}
