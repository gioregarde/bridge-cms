<?php

class PageTypeDao extends BaseDao {

    const TABLE = ' PAGE_TYPE ';

    static function findAll() {
        $result = parent::findAll(self::TABLE);
        $page_type_model_array = array();
        foreach ($result as $item) {
            array_push($page_type_model_array, new PageTypeModel($item));
        }
        return $page_type_model_array;
    }

}

?>