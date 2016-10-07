<?php

class PageDao extends BaseDao {

    static function findAll() {
        return parent::findAll('PAGE', 'PageModel');
    }

    static function findAllByPageType() {
        $statement = "SELECT * FROM PAGE WHERE PAGE_TYPE_ID = ?";
        $result = parent::select($statement, array(1));
        $page_model_array = array();
        foreach ($result as $item) {
            array_push($page_model_array, new PageModel($item));
        }
        return $page_model_array;
    }

    static function insert($page_model) {
        $statement = "INSERT PAGE (PAGE_TYPE_ID, NAME, URL, ENABLED, DATETIME) VALUES (?, ?, ?, ?, NULL)";
        $page_model -> setId(parent::insert($statement, array($page_model -> getPageTypeId(), $page_model -> getName(), $page_model -> getUrl(), $page_model -> getEnabled())));
    }

}

?>