<?php

class PageDao extends BaseDao {

    static function findAll() {
        return parent::findAllSQL('PAGE', 'PageModel');
    }

    static function findById($page_id) {
        $statement = "SELECT * FROM PAGE WHERE ID = ?";
        return new PageModel(parent::selectOneSQL($statement, array($page_id)));
    }

    static function findByUrl($url) {
        $statement = "SELECT * FROM PAGE WHERE URL = ?";
        return new PageModel(parent::selectOneSQL($statement, array($url)));
    }

    static function findByHomepage() {
        $statement = "SELECT * FROM PAGE WHERE HOMEPAGE = 1";
        return new PageModel(parent::selectOneSQL($statement));
    }

    static function insert($page_model) {
        $statement = "INSERT PAGE (NAME, URL, LAYOUT_ID, USER_ID, HOMEPAGE) VALUES (?, ?, ?, ?, ?)";
        $page_model -> setId(parent::insertSQL($statement, array($page_model -> getName(), $page_model -> getUrl(), $page_model -> getLayoutId(), $page_model -> getUserId(), $page_model -> getHomepage())));
    }

    static function update($page_model) {
        $statement = "UPDATE PAGE SET NAME = ?, URL = ?, LAYOUT_ID = ? , DATETIME = NOW(), USER_ID = ?, HOMEPAGE = ? WHERE ID = ?";
        return parent::updateSQL($statement, array($page_model -> getName(), $page_model -> getUrl(), $page_model -> getLayoutId(), $page_model -> getUserId(), $page_model -> getHomepage(), $page_model -> getId()));
    }

    static function delete($id_array) {
        $statement = "DELETE FROM PAGE WHERE ID IN (".implode(',', array_fill(0, count($id_array), '?')).')';
        return parent::deleteSQL($statement, $id_array);
    }

}

?>