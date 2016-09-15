<?php

class DBConnection {

    const SELECT_ALL = ' SELECT * FROM ';
    const SELECT = ' SELECT ';
    const FROM = ' FROM ';
    const WHERE = ' WHERE ';

    private static function getConnection() {
        static $con;
        if (!isset($con)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $con = new PDO(
                'mysql:host='.Properties::get(Properties::DB_HOST).';dbname='.Properties::get(Properties::DB_NAME), 
                Properties::get(Properties::DB_USER), 
                Properties::get(Properties::DB_PASS), 
                $pdo_options
            );
        }
        return $con;
    }

    public static function sql($statement) {
        $result = self::getConnection() -> query($statement);
        return $result -> fetchAll();
    }

    public static function select($table, $field = null, $condition = null) {
        $statement = '';
        if ($field != null) {
            $statement .= self::SELECT.$field.self::FROM.$table;
        } else {
            $statement .= self::SELECT_ALL.$table;
        }
        if ($condition != null) {
            $statement .= self::WHERE.$condition;
        }
        info($statement);
        $req = self::getConnection() -> query($statement);
        return $req->fetchAll();
    }

}

?>