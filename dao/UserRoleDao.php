<?php

class UserRoleDao extends BaseDao {

    static function findAll() {
        return parent::findAll('USER_ROLE', 'UserRoleModel');
    }

    static function findById($id) {
        $statement = 'SELECT * FROM USER_ROLE WHERE ID = ? ';
        return new UserRoleModel(parent::selectOne($statement, array($id)));
    }

}

?>