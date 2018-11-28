<?php

class Database {

    public function getConn(){
        $db_host = 'localhost';
        $db_name = 'CSI';
        $db_user = 'root';
        $db_password = '';

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name;
        try {
            $db = new PDO($dsn, $db_user, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }


}