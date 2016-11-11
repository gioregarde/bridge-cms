<?php

class UserDao extends BaseDao {

    static function findAll() {
        return parent::findAll('USER', 'UserModel');
    }

    static function findByUsername($username) {
        $statement = 'SELECT * FROM USER WHERE USERNAME = ? ';
        return new UserModel(parent::selectOne($statement, array($username)));
    }

}

?>