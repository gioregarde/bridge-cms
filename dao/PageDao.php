<?php

class PageDao extends BaseDao {

    const TABLE = ' PAGE ';

    static function findAll() {
        $result = parent::findAll(self::TABLE);
        $page_model_array = array();
        foreach ($result as $item) {
            array_push($page_model_array, new PageModel($item));
        }
        return $page_model_array;
    }

}

?>