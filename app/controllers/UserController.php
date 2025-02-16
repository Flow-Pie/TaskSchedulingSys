<?php

class UserController extends Controller

{
    protected $model;
    public function __construct()
    {
        $this->model= new UserModel();
    }

    public function index ($a ='hello', $b = '', $c = '')
    {
        $user = new UserController();

        $arr['username']='john Wambui';
        $arr['password']='123456';
        $arr['email']='johnwam@gmail.com';
        $arr['first_name']='john';
        $arr['last_name']='wambui';
        $arr['role']='admin';
        $arr['date_registered']='2022-02-19';

        //$res = $user->insert($arr);
        $res = $this->model->where(['user_id'=>1]);

        show($a);
        show($b);
        show($c);

        show($res);



        echo "<br> This is the Dashboard Controller from index function<br>";
        $this->view('dashboard');;
    }

    public function edit($a = '', $b = '', $c = '')
    {


        echo "<br> This is the Dashboard Controller from edit function <br>";
        $this->view('dashboard');
    }


}

