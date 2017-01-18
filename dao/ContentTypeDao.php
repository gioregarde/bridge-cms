<?php

class ContentTypeDao extends BaseDao {

    static function findAll() {
        return parent::findAllSQL('CONTENT_TYPE', 'ContentTypeModel');
    }

}

?>