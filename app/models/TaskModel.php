<?php
class TaskModel extends Model
{
    protected $allowedColumns = [
        'task_id',
        'user_id',
        'task_name',
        'task_description',
        'task_date',
        'status',
        'prioority',
        'date_created'
    ];


    public function __construct()
    {
        $this->table = 'Tasks';
    }
}
