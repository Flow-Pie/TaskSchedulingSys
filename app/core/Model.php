<?php

//this is the main model class
//common functions required by all models should be added here

class Model extends Database
{
    protected $table = 'Tasks';
    protected $limit = 10; //default limit for now!!
    protected $offset = 0;
    protected $order_type = "DESC";
    protected $order_column = "task_id";
    protected $allowedColumns = [];
    public $errors = [];


    function test()
    {
        $query = "SELECT * FROM  $this->table";
        $result = $this->query($query);

        show($result);
    }

    public function where($data, $data_not=[])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :" .$key . " && ";
        }

        foreach($keys_not as $key){
            $query .= $key . " !=:" . $key . " && ";
        }

        $query = trim($query, " && ");//at the end
        $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);

       // echo $query;

        return $this->query($query, $data);
    }

    public function first($data, $data_not=[])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " !=:" . $key . " && ";
        }

        $query = trim($query, " && "); //at the end
        $query .= " LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);

        if($result) return $result[0];
        return false;
    }

    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $query = "INSERT INTO `{$this->table}` (" . implode(", ", $keys) . ")
              VALUES (:" . implode(", :", $keys) . ")";

       return $this->query($query, $data);
    }


    public function update($id, $data, $id_column="id")
    {

        //remove any columns that are not allowed
        if(!empty($this->allowedColumns)){
            foreach($data as $key=>$value){
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $data[$id_column] = $id;

        $query = "UPDATE $this->table SET  ";

        foreach ($keys as $key){
            $query .= $key . " = :" . $key. ", ";
        }

        $query = trim($query, ", ");
        $query .= " WHERE $id_column = :$id_column";

        return $this->query($query, $data);


    }

    public function delete($id, $id_column="id")
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        return $this->query($query, $data);

    }

    public function findAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type";

        return $this->query($query);
    }

}
