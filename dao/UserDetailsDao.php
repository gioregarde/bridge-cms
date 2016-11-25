<?php

class UserDetailsDao extends BaseDao {

    static function findAll() {
        return parent::findAll('USER_DETAILS', 'UserDetailsModel');
    }

    static function findByUserId($user_id) {
        $statement = 'SELECT * FROM USER_DETAILS WHERE USER_ID = ? ';
        return new UserDetailsModel(parent::selectOne($statement, array($user_id)));
    }

}

?>