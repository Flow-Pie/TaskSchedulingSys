<?php
class Database{
    protected function connect()
    {
        $connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($connString, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = [])
    {
        $con =  $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);

        if (!$check) {
            return false;
        }


        if (stripos($query, 'INSERT') === 0) {
            return [
                "status" => "success",
                "last_insert_id" => $con->lastInsertId()
            ];
        }

        if (stripos($query, 'UPDATE') === 0 || stripos($query, 'DELETE') === 0) {
            return [
                "status" => "success",
                "affected_rows" => $stm->rowCount()
            ];
        }

        return $stm->fetchAll(PDO::FETCH_OBJ) ?: true;
    }



    public function get_first_row($query, $data = [])
    {
        $con =  $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ); //pass in PDO::FETCH_ASSOC if you prefer working with arrays

            if (is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }


}

