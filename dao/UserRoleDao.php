<?php

class UserRoleDao extends BaseDao {

    static function findAll() {
        return parent::findAllSQL('USER_ROLE', 'UserRoleModel');
    }

    static function findById($id) {
        $statement = 'SELECT * FROM USER_ROLE WHERE ID = ? ';
        return new UserRoleModel(parent::selectOneSQL($statement, array($id)));
    }

}

?>