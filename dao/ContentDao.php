<?php

class ContentDao extends BaseDao {

    static function findAll() {
        return parent::findAll('CONTENT', 'ContentModel');
    }

    static function findAllByContentType($content_type_id) {
        $statement = "SELECT * FROM CONTENT WHERE CONTENT_TYPE_ID = ?";
        $result = parent::select($statement, array($content_type_id));
        $model_array = array();
        foreach ($result as $item) {
            array_push($model_array, new ContentModel($item));
        }
        return $model_array;
    }

    static function findById($id) {
        $statement = "SELECT * FROM CONTENT WHERE ID = ?";
        return new ContentModel(parent::selectOne($statement, array($id)));
    }

    static function insert($model) {
        $statement = "INSERT CONTENT (CONTENT_TYPE_ID, NAME, USER_ID) VALUES (?, ?, ?)";
        $model -> setId(parent::insert($statement, array($model -> getContentTypeId(), $model -> getName(), $model -> getUserId())));
    }

    static function update($model) {
        $statement = "UPDATE CONTENT SET NAME = ?, DATETIME = NOW(), USER_ID = ? WHERE ID = ?";
        return parent::update($statement, array($model -> getName(), $model -> getUserId(), $model -> getId()));
    }

    static function delete($id_array) {
        $statement = "DELETE FROM CONTENT WHERE ID IN (".implode(',', array_fill(0, count($id_array), '?')).')';
        return parent::delete($statement, $id_array);
    }

}

?>