<?php

class BaseDao {

    const SELECT_ALL = ' SELECT * FROM ';

    protected static function findAll($table_name, $model_name) {
        $result = DBConnection::sql(self::SELECT_ALL.$table_name) -> fetchAll();
        $model_array = array();
        foreach ($result as $item) {
            array_push($model_array, new $model_name($item));
        }
        return $model_array;
    }

    protected static function selectOne($statement, $values = null) {
        return DBConnection::sql($statement, $values) -> fetch();
    }

    protected static function select($statement, $values = null) {
        return DBConnection::sql($statement, $values) -> fetchAll();
    }

    protected static function insert($statement, $values) {
        DBConnection::sql($statement, $values);
        return DBConnection::getInsertedIndex();
    }

    protected static function update($statement, $values) {
        return DBConnection::sql($statement, $values) -> rowCount();
    }

    protected static function delete($statement, $values) {
        return DBConnection::sql($statement, $values) -> rowCount();
    }

}

?>