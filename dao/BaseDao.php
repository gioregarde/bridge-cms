<?php

class BaseDao {

    const SELECT_ALL = ' SELECT * FROM ';

    protected static function findAllSQL($table_name, $model_name) {
        $result = DBConnection::sql(self::SELECT_ALL.$table_name) -> fetchAll();
        $model_array = array();
        foreach ($result as $item) {
            array_push($model_array, new $model_name($item));
        }
        return $model_array;
    }

    protected static function selectOneSQL($statement, $values = null) {
        return DBConnection::sql($statement, $values) -> fetch();
    }

    protected static function selectSQL($statement, $values = null) {
        return DBConnection::sql($statement, $values) -> fetchAll();
    }

    protected static function insertSQL($statement, $values) {
        DBConnection::sql($statement, $values);
        return DBConnection::getInsertedIndex();
    }

    protected static function updateSQL($statement, $values) {
        return DBConnection::sql($statement, $values) -> rowCount();
    }

    protected static function deleteSQL($statement, $values) {
        return DBConnection::sql($statement, $values) -> rowCount();
    }

}

?>