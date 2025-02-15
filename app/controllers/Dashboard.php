<?php

class Dashboard extends Controller
{
    public function index ()
    {
        $model = new Model;
        //$model->test();
        $arr['user_id'] =1;
        $arr['task_title'] = 'Washing dishes';
        $arr['task_description'] = 'I have to wash the dishes';
        $arr['task_date'] = '2022-02-19';
        $arr['status'] = 'pending';
        $arr['priority'] = 'low';

       try{
            $res = $model->insert($arr);
            echo "Inserted Successfully";
       }catch(Exception $e ){
        echo $e->getMessage();
       }

        show($res);

        echo " This is the Dashboard Controller <br>";
        $this->view('dashboard');
    }


}

