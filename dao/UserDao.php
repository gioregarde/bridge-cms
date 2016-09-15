<?php

class UserDao extends BaseDao {

    const TABLE = ' USER ';

    static function findByUsername($username) {
        $result = DBConnection::select(self::TABLE, null, 'username = "'.mysql_real_escape_string($username).'"');
        $user_model = null;
        if (count($result) == 1) {
            $user_model = new UserModel();
            $user_model = new UserModel($result[0]);
        }
        return $user_model;
    }

    static function findAll() {
        $result = parent::findAll(self::TABLE);
        $user_model_array = array();
        foreach ($result as $item) {
            array_push($user_model_array, new UserModel($item));
        }
        return $user_model_array;
    }

}

?>