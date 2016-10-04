<?php

class UserDao extends BaseDao {

    static function findAll() {
        return parent::findAll('USER', 'UserModel');
    }

    static function findByUsername($username) {
        $statement = 'SELECT * FROM USER WHERE USERNAME = ? ';
        $result = parent::select($statement, array($username));
        $user_model = null;
        if (count($result) == 1) {
            $user_model = new UserModel();
            $user_model = new UserModel($result[0]);
        }
        return $user_model;
    }

}

?>