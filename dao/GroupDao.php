<?php

class GroupDao extends BaseDao {

    const TABLE = ' GROUP ';

    static function findAll() {
        $result = parent::findAll(self::TABLE);
        $group_model_array = array();
        foreach ($result as $item) {
            array_push($group_model_array, new GroupModel($item));
        }
        return $group_model_array;
    }

}

?>