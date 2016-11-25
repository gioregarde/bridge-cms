<?php

class DBConnection {

    private static $isTransaction = false;

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

    public static function sql($statement, $values = null) {
        $ps = self::getConnection() -> prepare($statement);
        if ($values) {
            $ps -> execute($values);
        } else {
            $ps -> execute();
        }
        return $ps;
    }

    public static function getInsertedIndex() {
        return self::getConnection() -> lastInsertId();
    }

    public static function beginTransaction() {
        if (!self::$isTransaction) {
            self::getConnection() -> beginTransaction();
            self::$isTransaction = true;
        }
    }

    public static function endTransaction() {
        if (self::$isTransaction) {
            try {
                self::getConnection() -> commit();
            } catch (Exception $e) {
                self::getConnection() -> rollBack();
                error($e);
            }
            self::$isTransaction = false;
        }
    }

}

?>
