<?php

class BaseDao {

    protected static function findAll($table_name) {
        return DBConnection::select($table_name);
    }

}

?>