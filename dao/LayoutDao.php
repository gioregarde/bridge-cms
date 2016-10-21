<?php

class LayoutDao extends BaseDao {

    static function findAll() {
        return parent::findAll('LAYOUT', 'LayoutModel');
    }

}

?>