<?php

class PageContentDao extends BaseDao {

    static function findAll() {
        return parent::findAll('PAGE_CONTENT', 'PageContentModel');
    }

    static function findByPageId($id) {
        $statement = "SELECT * FROM PAGE_CONTENT WHERE PAGE_ID = ?";
        $result = parent::select($statement, array($id));
        $model_array = array();
        foreach ($result as $item) {
            array_push($model_array, new PageContentModel($item));
        }
        return $model_array;
    }

    static function insert($model) {
        $statement = "INSERT PAGE_CONTENT (PAGE_ID, CONTENT_ID) VALUES (?, ?)";
        parent::insert($statement, array($model -> getPageId(), $model -> getContentId()));
    }

    static function update($model, $content_id) {
        $statement = "UPDATE PAGE_CONTENT SET CONTENT_ID = ? WHERE PAGE_ID = ? AND CONTENT_ID = ?";
        parent::update($statement, array($model -> getContentId(), $model -> getPageId(), $content_id));
    }

    static function delete($model) {
        $statement = 'DELETE FROM PAGE_CONTENT WHERE PAGE_ID = ? AND CONTENT_ID = ?';
        return parent::delete($statement, array($model -> getPageId(), $model -> getContentId()));
    }

    static function deleteByPageId($id_array) {
        $statement = "DELETE FROM PAGE_CONTENT WHERE PAGE_ID IN (".implode(',', array_fill(0, count($id_array), '?')).')';
        return parent::delete($statement, $id_array);
    }

}

?>