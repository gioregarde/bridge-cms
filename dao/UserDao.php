<?php

class UserDao extends BaseDao {

    static function findAll() {
        return parent::findAllSQL('USER', 'UserModel');
    }

    static function findByUsername($username) {
        $statement = 'SELECT * FROM USER WHERE USERNAME = ? ';
        $user_model = new UserModel(parent::selectOneSQL($statement, array($username)));
        $user_model -> setUserRoleModel(UserRoleDao::findById($user_model -> getUserRoleId()));
        $user_model -> setUserDetailsModel(UserDetailsDao::findByUserId($user_model -> getId()));
        return $user_model;
    }

}

?>