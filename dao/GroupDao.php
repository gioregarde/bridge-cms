<?php

class GroupDao extends BaseDao {

    static function findAll() {
        return parent::findAll('GROUP', 'GroupModel');
    }

}

?>