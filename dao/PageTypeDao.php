<?php

class PageTypeDao extends BaseDao {

    static function findAll() {
        return parent::findAll('PAGE_TYPE', 'PageTypeModel');
    }

}

?>