<?php

//this is the main model class
//common functions required by all models should be added here

class Model extends Database
{
    protected $table = 'Tasks';
    protected $limit = 10; //default limit for now!!
    protected $offset =0;

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
        $query .= " LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
        //$this->query($query, ['id' => 2]);
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
        $keys = array_keys($data);

        $query = "INSERT INTO `{$this->table}` (" . implode(", ", $keys) . ")
              VALUES (:" . implode(", :", $keys) . ")";

       return $this->query($query, $data);
    }


    public function update($id, $data, $id_column="id")
    {

    }

    public function delete($id, $id_column="id")
    {

    }

}
