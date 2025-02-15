<?php
class Database{
    protected function connect()
    {
        $connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($connString, DBUSER, DBPASS);
        echo "DB Connected successfully";
        return $con;
    }

    public function query($query, $data = [])
    {
        $con =  $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);

        if (strpos(strtoupper($query), 'INSERT') !== false) {
            return $con->lastInsertId(); // Return the last inserted ID
        }

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result ?: true; // Return true if no results but successful
        }

        return false;
    }


    public function get_first_row($query, $data = [])
    {
        $con =  $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); //pass in PDO::FETCH_ASSOC if you prefer working with arrays

            if (is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }


}

