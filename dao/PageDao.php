<?php

class PageDao extends BaseDao {

    static function findAll() {
        return parent::findAll('PAGE', 'PageModel');
    }

    static function findById($page_id) {
        $statement = "SELECT * FROM PAGE WHERE ID = ?";
        return new PageModel(parent::selectOne($statement, array($page_id)));
    }
    
    static function findByUrl($url) {
        $statement = "SELECT * FROM PAGE WHERE URL = ?";
        return new PageModel(parent::selectOne($statement, array($url)));
    }
    

    static function insert($page_model) {
        $statement = "INSERT PAGE (NAME, URL, ENABLED, USER_ID) VALUES (?, ?, ?, ?)";
        $page_model -> setId(parent::insert($statement, array($page_model -> getName(), $page_model -> getUrl(), $page_model -> getEnabled(), $page_model -> getUserId())));
    }

    static function update($page_model) {
        $statement = "UPDATE PAGE SET NAME = ?, URL = ?, DATETIME = NOW() WHERE ID = ?";
        return parent::update($statement, array($page_model -> getName(), $page_model -> getUrl(), $page_model -> getId()));
    }

    static function delete($id_array) {
        $statement = "DELETE FROM PAGE WHERE ID IN (".implode(',', array_fill(0, count($id_array), '?')).')';
        return parent::delete($statement, $id_array);
    }

}

?>