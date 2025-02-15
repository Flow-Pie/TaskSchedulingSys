<?php

class Task extends Controller
{
    public function index()
    {
        echo " This is the Task Controller <br>";
        $this->view("task");
    }
}
