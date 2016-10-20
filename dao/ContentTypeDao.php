<?php

class ContentTypeDao extends BaseDao {

    static function findAll() {
        return parent::findAll('CONTENT_TYPE', 'ContentTypeModel');
    }

}

?>