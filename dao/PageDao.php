<?php

class PageDao extends BaseDao {

    static function findAll() {
        return parent::findAll('PAGE', 'PageModel');
    }

}

?>