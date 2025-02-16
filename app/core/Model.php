<?php

// Base Model Class
class Model extends Database
{
    protected $table = 'Tasks';
    protected $limit = 10; // Default limit
    protected $offset = 0;
    protected $order_type = "DESC";
    protected $order_column = "task_id";
    protected $allowedColumns = [];

    // Getters
    public function getOrderColumn()
    {
        return $this->order_column;
    }
    public function getOrderType()
    {
        return $this->order_type;
    }

    // Setters (Allow Method Chaining)
    public function setOrderColumn($column)
    {
        $this->order_column = $column;
        return $this;
    }

    public function setOrderType($type)
    {
        $this->order_type = strtoupper($type) === "DESC" ? "DESC" : "ASC";
        return $this;
    }

    // Sorting Method (NEW)
    public function orderBy($column, $type = "ASC")
    {
        $this->setOrderColumn($column);
        $this->setOrderType($type);
        return $this;
    }

    // Test Query
    public function test()
    {
        $query = "SELECT * FROM $this->table";
        $result = $this->query($query);
        show($result);
    }

    // WHERE Condition Query
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND "); // Remove trailing AND
        $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        return $this->query($query, array_merge($data, $data_not));
    }

    // Fetch Single Row
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ");
        $query .= " LIMIT 1"; // Always fetch one record

        $result = $this->query($query, array_merge($data, $data_not));
        return $result ? $result[0] : false;
    }

    // Insert Data
    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            $data = array_filter($data, fn($key) => in_array($key, $this->allowedColumns), ARRAY_FILTER_USE_KEY);
        }

        $keys = array_keys($data);
        $query = "INSERT INTO `{$this->table}` (" . implode(", ", $keys) . ") VALUES (:" . implode(", :", $keys) . ")";

        return $this->query($query, $data);
    }

    // Update Data
    public function update($id, $data, $id_column = "id")
    {
        if (!empty($this->allowedColumns)) {
            $data = array_filter($data, fn($key) => in_array($key, $this->allowedColumns), ARRAY_FILTER_USE_KEY);
        }

        $keys = array_keys($data);
        $data[$id_column] = $id;
        $query = "UPDATE $this->table SET " . implode(", ", array_map(fn($key) => "$key = :$key", $keys));
        $query .= " WHERE $id_column = :$id_column";

        return $this->query($query, $data);
    }

    // Delete Data
    public function delete($id, $id_column = "id")
    {
        $data = [$id_column => $id]; // FIXED: Initialize array
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        return $this->query($query, $data);
    }

    // Get All Records
    public function getAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type";
        return $this->query($query);
    }
}
